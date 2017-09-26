<?php 

namespace App\Helper;

use App\Model\Tr\Tugas;
use Request;

/**
* 
*/
class FileManager
{
	
	public static function download($type,$id)
	{
		switch ($type) {
			case 'tugas':
				$tugas = Tugas::find($id);
				$pathToFile = "public/file/kuliah/$tugas->id_ajar/$tugas->id_pertemuan/tugas/tugas.zip";
				return response()->download($pathToFile);
				break;
			
			default:
				# code...
				break;
		}
	}
}