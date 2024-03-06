# Mini Laravel Project

Laravel project intoducing the basic constructs.

## 0. Steps
1. Install Laravel
2. Install and setup MySQL database
3. Create Model and Migration
4. Run Migrations
5. Create Controller
6. Create Views
7. Configure Routes
8. Run the Development Server


## 1. Install Laravel 
- Create a base folder to hold your Laravel projects.

        mkdir LaravelProjects
        cd LaravelProjects

- Install php

        brew install php
        php --version

- Install composer

        php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
        php composer-setup.php --install-dir=/usr/local/bin --filename=composer
        php -r "unlink('composer-setup.php');"

- Install Laravel and create project

        # Install Laravel using Composer
        composer create-project --prefer-dist laravel/laravel MiniLaravelProject
        cd MiniLaravelProject


## 2. Install and Setup MySQL Database
- Install MySQL via Homebrew:

        # Update Homebrew
        brew update

        # Install MySQL
        brew install mysql

- Start MySQL Service:
    - This command starts the MySQL service and ensures that it automatically starts on system boot.

            brew services start mysql

- Secure MySQL Installation (Optional, but recommended):
    - For security purposes, you can run a script that will help you secure your MySQL installation.
    - Follow the on-screen prompts to set a root password and answer other security-related questions:

            mysql_secure_installation

- Access MySQL Shell:
    - Access the MySQL shell using the root user and the password you set during the secure installation:

            mysql -u root -p

- Create a Database:
    - Inside the MySQL shell, run the following SQL command to create a database named "laravel"

            CREATE DATABASE laravel;

- Create a User and Grant Permissions (Optional, but recommended):
    - While still in the MySQL shell, you can create a new user and grant necessary privileges to the "laravel" database. Replace 'your_user' and 'your_password' with your preferred username and password:

            CREATE USER 'your_user'@'localhost' IDENTIFIED BY 'your_password';
            GRANT ALL PRIVILEGES ON laravel.* TO 'your_user'@'localhost';
            FLUSH PRIVILEGES;

- Exit MySQL Shell:

        EXIT;

- Verify MySQL Installation:
    - You can verify that MySQL is running and the "laravel" database has been created by logging in again:

            mysql -u your_user -p

    - Enter the password when prompted and check if the "laravel" database is available:

            SHOW DATABASES;


## 3. Create Model and Migration
- Create model and migration for items
        
        php artisan make:model Item -m

- Edit the migration file at `database/migrations/xxxx_xx_xx_create_items_table.php`:

        // database/migrations/xxxx_xx_xx_create_items_table.php

        use Illuminate\Database\Migrations\Migration;
        use Illuminate\Database\Schema\Blueprint;
        use Illuminate\Support\Facades\Schema;

        class CreateItemsTable extends Migration
        {
            public function up()
            {
                Schema::create('items', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
                });
            }

            public function down()
            {
                Schema::dropIfExists('items');
            }
        }

## 4. Run Migrations

        php artisan migrate

## 5. Create Controller
- Create controller for items

        php artisan make:controller ItemController

- Edit the controller file at `app/Http/Controllers/ItemController.php`:

        // app/Http/Controllers/ItemController.php

        namespace App\Http\Controllers;

        use Illuminate\Http\Request;
        use App\Models\Item;

        class ItemController extends Controller
        {
            public function index()
            {
                $items = Item::all();
                return view('item.index', compact('items'));
            }
        }

## 6. Create Views
- Create a Blade view at `resources/views/item/index.blade.php`:

        <!-- resources/views/item/index.blade.php -->

        <!DOCTYPE html>
        <html>
            <head>
                <title>Item List</title>
            </head>
            <body>
                <h1>Item List</h1>
                <ul>
                    @foreach ($items as $item)
                        <li>{{ $item->name }}</li>
                    @endforeach
                </ul>
           </body>
        </html>

## 7. Configure Routes
- Edit the routes file at `routes/web.php`:

        // routes/web.php

        use App\Http\Controllers\ItemController;

        Route::get('/', [ItemController::class, 'index']);

## 8. Run the Development Server

        php artisan serve

## 9. End.


