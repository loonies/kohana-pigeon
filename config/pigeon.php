<?php defined('SYSPATH') or die('No direct script access.');

return array(
	'default' => array(
		'transport' => 'smtp',
		'options'   => array(
			'host'       => 'example.net',
			'port'       => 587,
			'timeout'    => 10,
			'encryption' => 'ssl',
			'username'   => 'user',
			'password'   => 'pass',
		),
	),
	'external' => array(
		'transport' => 'sendmail',
		'options'   => array(
			'command' => '/usr/sbin/exim -bs'
		),
	),
	'fallback' => array(
		'transport' => 'mail',
		'options'   => array(
			'params' => '-f%s'
		),
	),
);
