<?php 
 
namespace App;

use App\Traits\Singleton;

class Http
{
	public static function redirect($url)
	{
		header('Location: ' . $url);
	}

	public static function redirectPrevious()
	{
		if (@$_SERVER['HTTP_REFERER'] != null) {
            self::redirect($_SERVER['HTTP_REFERER']);
            return true;
        } 
		self::redirect("/");
        return false;
	}
}