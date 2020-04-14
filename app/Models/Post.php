<?php
    namespace App\Models;

    use App\User;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Post extends Model
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
    }
