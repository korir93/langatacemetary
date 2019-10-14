<?php
$server_root = $_SERVER['SERVER_NAME'];
if($server_root != 'localhost'){
	$server_addr = $_SERVER['SERVER_ADDR'];
	if($server_addr == '127.0.0.1'){
		$server_root = $_SERVER['SERVER_NAME'];
	}
}

defined('DB_SERVER') ? null : define("DB_SERVER", "localhost");
defined('DB_USER') ? null : define("DB_USER", "root");
defined('DB_PASS') ? null : define("DB_PASS", "");
defined('DB_NAME') ? null : define("DB_NAME", "langata_cemetary");

defined('APP_NAME') ? null : define("APP_NAME", "Langata Cemetary");
defined('SESSION_NAME') ? null : define("SESSION_NAME", "langata_admin");
defined('APP_PREFIX') ? null : define("APP_PREFIX", "Lanagata");
defined('DOCUMENT_ROOT') ? null : define("DOCUMENT_ROOT" , $_SERVER['DOCUMENT_ROOT'].'/cemetary');

defined('SERVER_BASE') ? null : define('SERVER_BASE', $server_root);
defined('SERVER_ROOT') ? null : define('SERVER_ROOT',$server_root.'/cemetary');
defined("ROUTES") ? null : define('ROUTES' , [
	
	'root' => '',
	'system' => 'system',
	
	'login' => 'login',
	'logout' => 'logout',

	'visitor' => 'visitor',
	'visitor_request' => 'visitors/request',
	'diceased_search' => 'visitors/search',

	'deceased' => 'system/deceased',
	'deceased_add' => 'system/deceased/add',
	'deceased_mod' => 'system/deceased/modify',
	'deceased_del' => 'system/deceased/delete',
	'deceased_alloc' => 'system/deceased/allocate',
	
	'staff' => 'system/staff' ,
	'staff_add' => 'system/staff/add',
	'staff_mod' => 'system/staff/modify',
	'staff_del' => 'system/staff/delete',
	
	'spots' => 'system/spots',
	'spots_add' => 'system/spots/add',
	'spots_mod' => 'system/spots/modify',
	'spots_del' => 'system/spots/delete',
	'spots_set_free' => 'system/spots/set_free',
	
	'info' => 'system/info',
	'info_add' => 'system/info/add',
	'info_mod' => 'system/info/modify',
	'info_del' => 'system/info/delete',
	
	'requests' => 'system/visitors',
	'request_del' => 'system/visitors/requests_del',
	'request_view' => 'system/visitors/requests_view'   
	
]);
