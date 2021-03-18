<?php
$root = dirname( __FILE__ ) . "/..";
$app = "{$root}/app";
$base_url = sprintf(
	"%s://%s%s",
	isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
	$_SERVER['SERVER_NAME'],
	$_SERVER['REQUEST_URI']
);

include_once( "{$app}/libraries/vendor/autoload.php" );
include_once( "{$app}/libraries/wp_formatting.php" );
include_once( "{$app}/config.php" );
include_once( "{$app}/utils.php" );

// Routing
$base_url = str_replace( 'index.php', '', $_SERVER['SCRIPT_NAME'] );
$base_url = str_replace( '/public', '', $base_url );

$request = substr( $_SERVER['REQUEST_URI'], strlen( $base_url ) );
if( strpos( $request, '?' ) !== null && strpos( $request, '?' ) !== false ) {
	$request = substr( $request, 0, strpos( $request, '?' ) );
}
$request = explode( "/", $request );
$request = array_values( array_filter($request, function($value) { return !is_null($value) && $value !== ''; }) );

$params = [];

$controller = 'index';
if( empty( $request[0] ) || is_numeric( $request[0] ) ) {
	if( empty( $request[0] ) ) {
		$request[0] = $controller;
	} else { // numeric and not empty
		$params[] = $request[0];
		$request[0] = $controller;
	}
}
$controller = $request[0];

$action = 'index';
if( empty( $request[1] ) || is_numeric( $request[1] ) ) {
	if( empty( $request[1] ) ) {
		$request[1] = $action;
	} else { // numeric and not empty
		$params[] = $request[1];
		$request[1] = $action;
	}
}
$action = $request[1];

$params = array_merge( $params, array_slice( $request, 2 ) );

if( !file_exists( "{$app}/controllers/{$controller}" ) ) { // 404
	$controller = 'index';
}
if( !file_exists( "{$app}/controllers/{$controller}/{$action}.php" ) ) { // 404
	$action = 'index';
}

$errors = [];

include_once( "{$app}/controllers/{$controller}/{$action}.php" );

include_once( "{$app}/views/base/head.php" );
if( empty( $errors ) ) {
	include_once( "{$app}/views/{$controller}/{$action}.php" );
} else {
	include_once( "{$app}/views/base/errors.php" );
}
include_once( "{$app}/views/base/footer.php" );