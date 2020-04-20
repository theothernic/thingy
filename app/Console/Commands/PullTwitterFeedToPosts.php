<?php

namespace App\Console\Commands;

use App\Models\Account;
use App\Models\Post;
use App\Services\TwitterService;
use Exception;
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
    protected $description = 'Pull account twitter feeds and load them in as posts.';

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
            Log::info('[' . self::class . '] Starting command.');

            Log::info('[' . self::class . '] Loading twitter accounts from database.');
            $this->line('Loading Twitter accounts from database.');
            $accounts = Account::where(['service' => 'twitter'])->get();

            Log::info('[' . self::class . '] Starting command.');
            $this->line('Pulling tweets from available accounts.');
            foreach ($accounts as $account)
            {
                $twitter = new TwitterService($account);

                $response = $twitter->getTimelineStatusesByUserId($account->remote_id);

                foreach ($response as $tweet)
                {
                    if (!Post::where(['account_id' => $account->id, 'remote_post_id' => $tweet->id_str])->exists())
                    {
                        Log::info('[' . self::class . '] Creating post from tweet ID: ' . $tweet->id_str);
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


            Log::info('[' . self::class . '] Finishing command.');
            $this->line('Task completed.');
        }

        catch (Exception $e)
        {
            Log::error($e);
            $this->error($e);
        }
    }
}
