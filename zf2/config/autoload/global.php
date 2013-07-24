<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(

		'smtp' => array(
				'name' 		=> 'server.digidev.com',
				'host' 		=> 'server.digidev.com',
				'username'	=> 'service+digidev.com',
				'password'  => 'ServiceIsC00l!!!'
		),
		/*
		// for album module only
		'db' => array(
				'driver'         => 'Pdo',
				'dsn'            => 'mysql:dbname=zf2;host=localhost',
				'username' 		 => 'zf1',
				'password'	     => '6630Sunset!!!',
				'driver_options' => array(
						PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
				),
		),
		*/
		'service_manager' => array(
				'factories' => array(
						/* for album module only
						'Zend\Db\Adapter\Adapter'=> 'Zend\Db\Adapter\AdapterServiceFactory',
						*/




				),


		),

);



