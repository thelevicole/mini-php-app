<?php

namespace App;

class ExampleController {

	public function index() {

		$app_name = getenv('APP_NAME');

		return view('example', [
			'title' => $app_name
		]);
	}

}
