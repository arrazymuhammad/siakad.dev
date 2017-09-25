<?php 

namespace App\Helper;

use Request;

/**
* 
*/
class ViewHelper
{
	
	public static function activeRoute($route = null)
	{
		if ($route) {
			if(Request::is($route) or Request::is($route."/*")) return "active";
		} else {
			if(Request::is('/')) return "active";
		}	
	}
}