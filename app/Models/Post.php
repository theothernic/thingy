<?php
    namespace App\Models;

    use App\User;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Illuminate\Support\Str;
    use Spatie\Feed\Feedable;
    use Spatie\Feed\FeedItem;

    class Post extends Model implements Feedable
    {
        use SoftDeletes;

        protected $table = 'posts';
        protected $primaryKey = 'id';
        protected $fillable = [
            'user_id',
            'account_id',
            'remote_post_id',
            'title',
            'body',
            'posted_at'
        ];

        protected $dates = [
            'posted_at'
        ];

        public function author()
        {
            return $this->belongsTo(User::class, 'user_id');
        }

        public function account()
        {
            return $this->belongsTo(Account::class, 'account_id');
        }

        public function tags()
        {
            return $this->morphToMany(Tag::class, 'taggable');
        }

        public function toFeedItem()
        {
            return FeedItem::create()
                ->id($this->id)
                ->title($this->title)
                ->summary(Str::limit($this->body, 50))
                ->updated($this->updated_at)
                ->link($this->link)
                ->author($this->author->name);
        }

        public static function getFeedItems()
        {
            return static::all();
        }

        public function getLinkAttribute()
        {
            return route('posts.show', $this);
        }
    }
