<?php
ini_set( 'display_errors', 1 );
ini_set( 'display_startup_errors', 1 );
error_reporting( E_ALL );

use Medoo\Medoo;

global $database;
$database = new Medoo([
	'database_type'	=> 'mysql',
	'database_name'	=> 'sedayefedagh',
	'server'		=> 'localhost',
	'username'		=> 'root',
	'password'		=> '1'
]);