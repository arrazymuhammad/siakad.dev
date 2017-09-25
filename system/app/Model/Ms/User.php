<?php

namespace App\Model\Ms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'ms_user';
    protected $hidden = ['password', 'pin'];

    public function Dosen()
    {
        return $this->hasOne('\App\Model\Ms\Dosen', 'id_user', 'id');
    }

    public function Mahasiswa()
    {
        return $this->hasOne('\App\Model\Ms\Mahasiswa', 'id_user');
    }

    public function getNamaAttribute()
    {
    	switch ($this->level) {
    		case '1':
    			return $this->mahasiswa->nama;
    			break;
    		
    		case '2':
    			return $this->dosen->nama;
    			break;
    		
    		case '3':
    			return $this->dosen->nama;
    			break;
    		
    		default:
    			return $this->userid;
    			break;
    	}
    }

    public function getJabatanAttribute()
    {
    	switch ($this->level) {
    		case '1':
    			return "Mahasiswa";
    			break;
    		
    		case '2':
    			return "Dosen";
    			break;
    		
    		case '3':
    			return "Kajur";
    			break;
    		
    		default:
    			return "Administrator";
    			break;
    	}
    }
}
