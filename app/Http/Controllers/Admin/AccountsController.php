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
            $twitter = (new TwitterService())->setCallbackUrl(route('service.callback', ['service' => 'twitter']))
                ->buildAuthUrl();

            $viewData = [
                'services' => [
                    'twitter' => [
                        'authorizeUrl' => $twitter->authorizeUrl
                    ]
                ]
            ];


            return view('admin.accounts.create', $viewData);
        }
    }
