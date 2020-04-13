<?php
    namespace App\Traits;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Str;

    trait UsesGuids
    {
        protected static function boot()
        {
            parent::boot();

            static::creating(function (Model $model) {
                if (!$model->getKey())
                {
                    $model->{$model->getKeyName()} = (string) Str::uuid();
                }
            });
        }


        public function getIncrementing() {
            return false;
        }

        public function getKeyType() {
            return 'string';
        }
    }
