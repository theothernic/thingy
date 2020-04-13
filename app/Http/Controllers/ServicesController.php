<?php
    namespace App\Http\Controllers;

    use App\Services\TwitterService;
    use Illuminate\Http\Request;

    class ServicesController extends Controller
    {
        public function callback(Request $request, $service = null)
        {
            $redirection = redirect()->route('admin.accounts.index');
            switch($service)
            {
                case 'twitter':
                    if ($request->has('denied'))
                    {
                        $redirection->with('error', 'You cancelled the Twitter authorization process. No accounts were added.');
                    }

                    else
                    {
                        $twitter = new TwitterService();
                        $twitter->authorize($request)->save();
                    }
                    break;
            }

            return $redirection;
        }
    }
