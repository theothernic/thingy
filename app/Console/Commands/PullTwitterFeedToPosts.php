<?php

namespace App\Console\Commands;

use App\Models\Account;
use App\Models\Post;
use App\Services\TwitterService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class PullTwitterFeedToPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'social:twitter:pull';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //

        try {

            $this->line('Loading Twitter accounts from database.');
            $accounts = Account::where(['service' => 'twitter'])->get();

            $this->line('Pulling tweets from available accounts.');
            foreach ($accounts as $account)
            {
                $twitter = new TwitterService($account);

                $response = $twitter->getTimelineStatusesByUserId($account->remote_id);

                foreach ($response as $tweet)
                {
                    if (!Post::where(['account_id' => $account->id, 'remote_post_id' => $tweet->id_str])->exists())
                    {
                        $this->line('Creating post from tweet ID: ' . $tweet->id_str);
                        Post::create([
                            'user_id'           => $account->user_id,
                            'account_id'        => $account->id,
                            'remote_post_id'    => $tweet->id_str,
                            'title'             => '...from the Twitter bureau',
                            'body'              => $tweet->text,
                        ]);
                    }
                }
            }


            $this->line('Task completed.');
        }

        catch (Exception $e)
        {
            Log::error($e);
            $this->error($e);
        }
    }
}