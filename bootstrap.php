<?php
	require_once __DIR__.'/vendor/autoload.php';

	/* Load enviroment variables
	-------------------------------------------------------- */
	$dotenv = new Dotenv\Dotenv( __DIR__ );
	$dotenv->load();

	/* Include user functions
	-------------------------------------------------------- */
	$functions_files = __DIR__.'/app/functions.php';
	if (is_readable($functions_files)) {
		require_once $functions_files;
	}

	/* Router
	-------------------------------------------------------- */
	$router = new AltoRouter();
	$routes_files = __DIR__.'/app/routes.php';
	if (is_readable($routes_files)) {
		require_once $routes_files;
	}
	
	$match = $router->match();

	// Mtach routes else throw 404
	if (!$match) {
		header($_SERVER['SERVER_PROTOCOL'].' 404 Not Found');
	} else if (is_callable($match['target'])) {
		call_user_func_array($match['target'], $match['params']);
	} else {
		list($controller, $action) = explode('#', $match['target']);
		if (is_callable([$controller, $action])) {
			call_user_func_array([$controller, $action], [$match['params']]);
		} else {
			// Routes are wrong.
			// Throw an exception in debug, send a 500 error in production
		}
	}
