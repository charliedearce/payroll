<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Crypt;
use App\Eloquent;
use Illuminate\Contracts\Encryption\DecryptException;
class Employees extends Model
{
    
    //protected $table = 'employees';
    use Encryptable;

    protected $encryptable = [
        //'path',
        'emp_id',
        'firstname',
        'lastname',
        'middlename',
        'email',
        'civilstatus',
        'phone',
        'religion',
        'zipcode',
        'address',
        'gender',
        'taxcon',
        'ssscon',
        'philcon',
        'pagibigcon',
        'position',
        'branch',
        'department',
        'status',
        'tinnum',
        'philnum',
        'sssnum',
        'pagibignum',
        'dependent1',
        'dependent2',
        'dependent3',
        'dependent4',
        'banktype',
        'banknum',
    ];

  
}

trait Encryptable
{
    public function getAttribute($key)
    {
        if (in_array($key, $this->encryptable))
        {
            return Crypt::decrypt($this->attributes[$key]);
        }

        return parent::getAttribute($key);
    }

    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encryptable)) {
            $value = Crypt::encrypt($value);
        }

        return parent::setAttribute($key, $value);
    }
}

 /* 
protected $encrypt = [
		'firstname',
        'lastname',];

    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->encrypt))
        {
            $value = Crypt::encrypt($value);
        }

        return parent::setAttribute($key, $value);
    }

    public function getAttribute($key)
    {
        if (in_array($key, $this->encrypt))
        {
            return Crypt::decrypt($this->attributes[$key]);
        }

        return parent::getAttribute($key);
    }

    public function attributesToArray()
    {
        $attributes = parent::attributesToArray();

        foreach ($attributes as $key => $value)
        {
            if (in_array($key, $this->encrypt))
            {
                $attributes[$key] = Crypt::decrypt($value);
            }
        }

        return $attributes;
    }

*/