<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?= $title; ?> | Home</title>

	<style>
		@import url('https://fonts.googleapis.com/css?family=Work+Sans:400,900');

		html, body {
			font-family: 'Work Sans', sans-serif;
			background: #f9f9f9;
			color: #333;
			padding: 0;
			margin: 0;
		}

		body {
			min-height: 100vh;
			display: flex;
			align-items: center;
		}

		*, *:before, *:after {
			box-sizing: border-box;
		}

		a {
			color: #3023AE;
			transition: color 0.4s ease;
		}

		a:hover {
			color: #FF0099;
		}

		.box {
			max-width: 600px;
			margin: 0 auto;
			text-align: center;
		}

		.box h1 {
			display: inline-block;
			font-weight: 900;
			text-transform: uppercase;
			letter-spacing: 0.35rem;
			font-size: 4rem;
			line-height: 3.5rem;
			margin-top: 0;
			color: transparent;
			text-shadow: -2px -2px 0 #FF009970, 2px 2px 0 #3023AE30;
		}

		.box > ul {
			padding: 0;
			margin: 0;
			list-style: none;
		}

		.box > ul > li {
			display: inline-block;
			margin: 0 10px;
		}

		.box > ul > li a {
			text-decoration: none;
		}
	</style>

</head>
<body>

	<div class="box">
		<h1><?= $title; ?></h1>
		<ul>
			<li><a href="https://github.com/thelevicole/mini-php-application-boilerplate" target="_blank">GitHub</a></li>
			<li><a href="https://github.com/thelevicole/mini-php-application-boilerplate/blob/master/README.md" target="_blank">Documentation</a></li>
			<li><a href="https://thelevicole.com" target="_blank">Author</a></li>
		</ul>
	</div>

</body>
</html>
