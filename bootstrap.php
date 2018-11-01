<?php
	require_once __DIR__.'/vendor/autoload.php';

	/* Definitions
	-------------------------------------------------------- */
	foreach ([
		'ROOT_DIR'		=> __DIR__,
		'PUBLIC_DIR'	=> __DIR__.'/public',
		'APP_DIR'		=> __DIR__.'/app',
		'VIEW_DIR'		=> __DIR__.'/app/views'
	] as $key => $value) { define($key, $value); }

	/* Load enviroment variables
	-------------------------------------------------------- */
	$dotenv = new Dotenv\Dotenv( ROOT_DIR );
	$dotenv->safeLoad();

	/* Include user functions
	-------------------------------------------------------- */
	$functions_files = ROOT_DIR.'/app/functions.php';
	if ( is_readable($functions_files) ) {
		require_once $functions_files;
	}

	/* Router
	-------------------------------------------------------- */
	$router = new AltoRouter();
	$routes_files = ROOT_DIR.'/app/routes.php';
	if ( is_readable($routes_files) ) {
		require_once $routes_files;
	}

	$match = $router->match();

	// If no match throw 404
	if ( !$match ) {
		header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
		exit;
	}

	// Else check if target is a function
	else if ( is_callable($match['target']) ) {
		call_user_func_array($match['target'], $match['params']);
	}

	// If target is not a callable, treat it as a class name with method
	else {

		list($controller, $action) = explode('@', $match['target']);

		if ( is_callable([$controller, $action]) ) {
			call_user_func_array([$controller, $action], $match['params']);
		} else {
			// Routes are wrong.
			// Throw an exception in debug, send a 500 error in production
		}
	}
