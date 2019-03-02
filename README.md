# Mini PHP application boilerplate

A basic starting point for a small PHP application. Currently no database support.

## Quick start

Clone and install dependancies
```bash
git clone https://github.com/thelevicole/mini-php-app.git
cd mini-php-app
composer install
```
### Serve
Local serve from project directory
```bash
php -S localhost:8000 -t public
```

### Clone enviroment file
The below comamnd will copy the `.env.example` file to `.env`. Here you can add variables specific to the enviroment. E.g. API keys, database passswords..etc
```bash
cp .env.example .env
```

### Setup video (outdated)
[► Watch on YouTube](https://www.youtube.com/watch?v=9TOB4kaViPw)

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
