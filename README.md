
# Mini PHP MVC application boilerplate

A basic starting point for a small PHP application. Now supporting database connections.

## Quick start

Clone and install dependancies
```bash
git clone https://github.com/thelevicole/mini-php-application-boilerplate.git
cd mini-php-application-boilerplate
composer install
```
### Serve
Local serve from project directory without local database.
```bash
php -S localhost:8000 -t public
```

### Clone enviroment file
The below comamnd will copy the `.env.example` file to `.env`. Here you can add variables specific to the enviroment. E.g. API keys, database passswords..etc
```bash
cp .env.example .env
```

### Setup video
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

## Models
Making use of the [illuminate/database](https://github.com/illuminate/database) component shipped with Laravel.

A models folder has already been created to keep things organised (`/app/Models`), but a model class can essentially be put anywhere within the `app` folder.

For example, say you have you have a `users` table and you want to find a "user" by their `username`.

First create a model for the users table:
**/app/Models/User.php**
```php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class User extends Model {
	// Model logic here...
}
```
Eloquent will guess the table from the class name. If you want to specify a table add the $table property to your model: `protected $table = 'users_table';`

Now, for example, you can access your model from a controller:
**/app/Controllers/ExampleController.php**
```php
namespace App\Controllers;
use App\Models\User;

class ExampleController {
	public function profile() {
		$john = User::where('username', 'johndoe')->first();
	}
}
```

For further documentation on using the various database facilities this library provides, consult the [Laravel framework documentation](https://laravel.com/docs).


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
