<?php
    namespace App\Models;

    use App\Traits\Encryptable;
    use Illuminate\Database\Eloquent\Model;

    class SocialMediaAccount extends Model
    {
        use Encryptable;

        protected $table = 'accounts';
        protected $primaryKey = 'id';
        protected $fillable = [
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
