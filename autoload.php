<?php
/**
 * Autoload file that needs to be laoded to use the ValidationWall
 */

if (!defined('VALIDATIONWALL_ROOT')) {
    define('VALIDATIONWALL_ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);
}

spl_autoload_register('autoload');

function autoload($class)
{
	if ( class_exists($class,FALSE) ) {
		//    Already loaded
		return FALSE;
	}
	
	$class = str_replace('ValidationWall\\', '', $class);
	$class = str_replace('\\', '/', $class);
	
	$is_file = false;
	if ( file_exists(VALIDATIONWALL_ROOT.'src'.DIRECTORY_SEPARATOR.$class.'.php') )
	{
		$is_file = VALIDATIONWALL_ROOT.'src'.DIRECTORY_SEPARATOR.$class.'.php';
	}
	elseif ( file_exists(VALIDATIONWALL_ROOT.'predefined'.DIRECTORY_SEPARATOR.$class.'.php') )
	{
		$is_file = VALIDATIONWALL_ROOT.'predefined'.DIRECTORY_SEPARATOR.$class.'.php';
	}
	
	if ( $is_file !== false )
	{
		require($is_file);
	}
	
	return false;
}
