<?php

namespace App\Controllers;

class ExampleController {

	public function index() {

		$app_name = getenv('APP_NAME') ?: 'No .env file';

		return view('example', [
			'title' => $app_name
		]);
	}

}
