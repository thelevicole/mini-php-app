<?php

	/**
	 * Send a JSON content type response
	 *
	 * @see		http://php.net/manual/en/function.json-encode.php
	 *
	 * @param 	mixed	$value		Value to be printed to screen
	 * @param	integer	$options	Bitmask
	 * @param 	integer	$depth  	Set the maximum depth. Must be greater than zero
	 *
	 * @return	void
	 */
	function json_response($value, $options = 0, $depth = 512) {
		header('Content-type: application/json; charset=utf-8');
		echo json_encode($value, $options, $depth);
		return;
	}

	/**
	 * Include view file and pass `$vars`
	 *
	 * @param	string	$name	Name of view file
	 * @param	array	$vars	Key will be used as variable name
	 *
	 * @return	void
	 */
	function view($name, $vars = []) {
		$_dirs			= explode('/', $name);
		$_filename		= array_pop($_dirs);
		$_resolve_path	= ltrim(implode('/', $_dirs).'/'.$_filename.'.php', '/');

		extract($vars);

		require_once VIEW_DIR.'/'.$_resolve_path;
	}
