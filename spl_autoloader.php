<?php
	spl_autoload_register(function($class) 
	{
		$finalPath = str_replace("\\", "/", $class);
		$finalPath = str_replace("Blog/", "", $finalPath);
	    $finalPath = $finalPath.'.php';
		require_once $finalPath;
	});