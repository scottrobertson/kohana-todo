<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
	'default' => array
	(
		'type'       => 'mysql',
		'connection' => array(
			'hostname'   => '127.0.0.1',
			'database'   => 'todo',
			'username'   => '',
			'password'   => null,
			'persistent' => false,
		),
		'table_prefix' => null,
		'charset'      => 'utf8',
		'caching'      => true,
		'profiling'    => true,
	),
);