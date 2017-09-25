<?php

namespace App\Model\Ms;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'ms_dosen';
    
    public function User()
    {
        return $this->hasOne('\App\Model\Ms\User', 'id' ,'id_user');
    }

    public function Ajar()
    {
        return $this->hasMany('\App\Model\Tr\Ajar', 'id_dosen');
    }
}
