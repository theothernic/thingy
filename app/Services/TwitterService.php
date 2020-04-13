<?php
    namespace App\Services;

    use Abraham\TwitterOAuth\TwitterOAuth;
    use App\Exceptions\FeedbagServiceException;
    use App\Models\Account;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;
    use Exception;

    class TwitterService {

        private $client;
        private $_vars = [];

        public function __construct(ServiceConfig $config = null)
        {
            $this->config = $config;

            // if a SocialMediaAccount model is passed in, it means we're already authorized
            // thru twitter, otherwise we're probably trying to run the oauth process.
            if (isset($config))
            {
                $this->client = new TwitterOAuth(env('TW_API_KEY'), env('TW_API_SEKRIT'),
                    $config->token, $config->secret);
            }

            else
            {
                $this->client = new TwitterOAuth(env('TW_API_KEY'), env('TW_API_SEKRIT'));
            }


        }

        public function __get($name)
        {
            return $this->_vars[$name];
        }

        public function __set($name, $value)
        {
            $this->_vars[$name] = $value;
        }

        public function getAccessToken()
        {
            return $this->_vars['accessToken'];
        }

        public function setCallbackUrl($url = null)
        {
            $this->_vars['callbackUrl'] = $url;
            return $this;
        }

        public function buildAuthUrl()
        {
            if (!isset($this->_vars['callbackUrl']) || empty($this->_vars['callbackUrl']))
            {
                throw new FeedbagServiceException('Bad Twitter callback url, or url not set.');
            }

            $callbackUrl = $this->_vars['callbackUrl'];
            $this->_vars['requestToken'] = $this->client->oauth('oauth/request_token', ['oauth_callback' => $callbackUrl]);
            $this->_vars['authorizeUrl'] = $this->client->url('oauth/authorize',
                ['oauth_token' => $this->_vars['requestToken']['oauth_token']]);


            if (Session::has('tw_rq_tok'))
            {
                Session::forget('tw_rq_tok');
            }
            Session::push('tw_rq_tok', $this->_vars['requestToken']);

            return $this;
        }

        public function authorize(Request $request)
        {
            $this->_vars['requestToken'] = head(Session::get('tw_rq_tok'));

            if ($request->has('oauth_token') && $this->_vars['requestToken']['oauth_token'] !== $request->get('oauth_token'))
            {
                throw new FeedbagServiceException('There was a problem when trying to validate the Twitter token.');
            }

            // replace the current client with one that uses the temporary token.
            $this->client = new TwitterOAuth(env('TW_API_KEY'), env('TW_API_SEKRIT'),
                $this->_vars['requestToken']['oauth_token'], $this->_vars['requestToken']['oauth_token_secret']);

            $this->_vars['accessToken'] = $this->client->oauth('oauth/access_token', ['oauth_verifier' => $request->get('oauth_verifier')]);

            return $this;
        }

        /**
         * @return $this
         * @throws FeedbagServiceException
         */
        public function save()
        {
            $account = Account::firstOrNew([
                'service'   => 'twitter',
                'remote_id' => $this->_vars['accessToken']['user_id']
            ]);

            $account->nickname      = $this->_vars['accessToken']['screen_name'];
            $account->token         = $this->_vars['accessToken']['oauth_token'];
            $account->secret        = $this->_vars['accessToken']['oauth_token_secret'];

            if (!$account->save())
            {
                throw new FeedbagServiceException('Could not save Twitter account details.');
            }

            return $this;
        }
    }
