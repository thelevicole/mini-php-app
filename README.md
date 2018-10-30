# Mini PHP application boilerplate

⚠️ Work in progress ⚠️

A basic starting point for a small PHP application.

## Quick start

```bash
git clone git@github.com:thelevicole/mini-php-application-boilerplate.git
cd mini-php-application-boilerplate
composer install
```

## Routing

The AltoRouter package is used to handle all application routing. The routes file can be found in `app/routes.php`.

For documentation visit [altorouter.com](http://altorouter.com/usage/mapping-routes.html)

## Enviroment variables

Using the [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv) package we load environment variables from `.env`.

You can access these variables 3 ways:

```php
$s3_bucket = getenv('S3_BUCKET');
$s3_bucket = $_ENV['S3_BUCKET'];
$s3_bucket = $_SERVER['S3_BUCKET'];
```