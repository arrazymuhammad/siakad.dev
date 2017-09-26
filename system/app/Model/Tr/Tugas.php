<?php

namespace App\Model\Tr;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $table = 'tr_tugas';

    protected $dates = [
    	'deadline',
        'created_at',
        'updated_at'
    ];

    public function Pertemuan()
    {
    	return $this->belongsTo('\App\Model\Tr\Pertemuan', 'id_pertemuan');
    }
}
