<?php
    namespace App\Models;

    use App\Traits\Encryptable;
    use App\Traits\UsesGuids;
    use Illuminate\Database\Eloquent\Model;

    class Account extends Model
    {
        use Encryptable;
        use UsesGuids;

        protected $table = 'accounts';
        protected $primaryKey = 'id';
        protected $fillable = [
            'user_id',
            'remote_id',
            'nickname',
            'service',
            'token',
            'secret'
        ];
        protected $hidden = [
            'token', 'secret'
        ];
        protected $encryptable = [
            'token', 'secret'
        ];

    }
