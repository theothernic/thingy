<?php
    namespace App\Http\Controllers\Admin;


    use App\Http\Controllers\Controller;
    use App\Models\Account;
    use App\Services\TwitterService;

    class AccountsController extends Controller
    {
        public function index()
        {
            $viewData = [
                'records' => Account::paginate(6)
            ];


            return view('admin.accounts.index', $viewData);
        }


        /**
         * @throws \App\Exceptions\FeedbagServiceException
         */
        public function create()
        {
            $twitter = new TwitterService();
            $twitter->setCallbackUrl();


            $viewData = [
                'services' => [
                    'twitter' => [
                        'authorizeUrl' => $twitter->setCallbackUrl(route('services.callback', ['service' => 'twitter']))->buildAuthUrl()
                    ]
                ]
            ];


            return view('admin.accounts.create', $viewData);
        }
    }
