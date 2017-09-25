<?php

namespace App\Model\Rf;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'rf_mata_kuliah';

    public function getJenisMkAttribute()
    {
    	switch ($this->attributes['jenis_mk']) {
    		case '1':
    			$jenis_mk = "Teori";
    			break;
    		
    		case '2':
    			$jenis_mk = "Praktikum";
    			break;
    		
    		case '3':
    			$jenis_mk = "Teori-Praktikum";
    			break;
    		default:
    			break;
    	}
    	return $jenis_mk;
    }
}
