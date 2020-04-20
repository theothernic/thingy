<?php
    namespace App\Models;

    use App\Traits\UsesGuids;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Tag extends Model
    {
        use UsesGuids;
        use SoftDeletes;

        public function posts()
        {
            return $this->morphedByMany(Post::class, 'taggable');
        }


    }
