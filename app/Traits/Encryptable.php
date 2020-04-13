<?php
    namespace App\Traits;


    use Exception;
    use Illuminate\Support\Facades\Crypt;

    trait Encryptable
    {
        public function getAttribute($key)
        {
            $value = parent::getAttribute($key);

            if(in_array($key, $this->encryptable))
            {
                try
                {
                    $value = Crypt::decrypt($value);
                }

                catch (Exception $e)
                {
                    $value = null;
                }
            }

            return $value;
        }

        public function setAttribute($key, $value)
        {
            parent::setAttribute($key, $value);
            $value = $this->attributes[$key];
            if (in_array($key, $this->encryptable))
            {
                $this->attributes[$key] = Crypt::encrypt($value);
            }

            return $this;
        }
    }
