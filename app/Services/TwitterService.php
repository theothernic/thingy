<?php
    namespace App\Services;

    use Abraham\TwitterOAuth\TwitterOAuth;
    use App\Exceptions\FeedbagServiceException;
    use App\Models\Account;
    use mysql_xdevapi\Exception;

    class TwitterService {

        private $client;
        private $_vars = [];

        public function __construct(Account $twitterAccount = null)
        {

            // if a SocialMediaAccount model is passed in, it means we're already authorized
            // thru twitter, otherwise we're probably trying to run the oauth process.
            if (isset($twitterAccount))
            {
                $this->client = new TwitterOAuth(env('TW_API_KEY'), env('TW_API_SEKRIT'),
                    $twitterAccount->token, $twitterAccount->secret);
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
            return $this;
        }


        public function authorize()
        {

        }
    }
