
# Mini PHP application boilerplate

⚠️ Work in progress ⚠️

A basic starting point for a small PHP application. Currently no database support.

## Quick start

Clone and install dependancies
```bash
git clone git@github.com:thelevicole/mini-php-application-boilerplate.git
cd mini-php-application-boilerplate
composer install
```
### Serve
Local serve from project directory
```bash
php -S localhost:8000 -t public
```

## Routing

The [AltoRouter](http://altorouter.com/) package is used to handle all application routing. The routes file can be found in `app/routes.php`.

You can handle the request by calling a function directly, for example:
```php
$router->map('GET', '/users/[i:id]', function($id) {
	// Do something with $id
});
```

Or you can use a controller method:
```php
$router->map('GET', '/users/[i:id]', 'ControllerName@method_name');
```

## View helper function

```php
view('profile', [ 'name' => 'John Doe' ]);
```

The first argument corresponds to the name of the view file in the `app/views` directory. The second argument is an array of data that should be made available to the view. In this case, we are passing the name variable.

To reference nested views you can do this with "dot" notation. For example, if your view is stored at `app/views/admin/profile.php`, you can reference it like bellow.

```php
view('admin.profile', [ 'name' => 'John Doe' ]);
```

## PHP constants

```php
$root	= ROOT_DIR;		# /
$public	= PUBLIC_DIR;	# /public
$app	= APP_DIR;		# /app
$views	= VIEW_DIR;		# /app/views
```

## Enviroment variables

Using the [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv) package we load environment variables from `.env`.

You can access these variables 3 ways:

```php
$s3_bucket = getenv('S3_BUCKET');
$s3_bucket = $_ENV['S3_BUCKET'];
$s3_bucket = $_SERVER['S3_BUCKET'];
```
