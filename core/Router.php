<?php

class Router
{

	private static function load($path, $method, $callback)
	{
		$uri = $_SERVER['PATH_INFO']
			?? $_SERVER['REDIRECT_URL']
			?? $_SERVER['REQUEST_URI'];

		if ($path === $uri && $method === $_SERVER['REQUEST_METHOD']) {

			function redirect($path)
			{
				header("Location: $path");
				exit();
			}

			$callback($GLOBALS['note']);
			exit();
		}
	}

	public static function get($path, $callback)
	{
		self::load($path, 'GET', $callback);
	}

	public static function post($path, $callback)
	{
		self::load($path, 'POST', $callback);
	}
}
