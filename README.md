# lumen-crud
CRUD API sample, built with lumen. Used in https://github.com/andy1992/react-native-crud and  https://github.com/andy1992/angular5-crud repositories.

# Installation
## 1. Clone this repository, or download .zip file.
    git clone https://github.com/andy1992/lumen-crud
    
## 2. On the project directory, run:
    composer install
(assuming you have composer installed)

## 3. Setup your database connection in .env file
Create the database in your environment, and setup the database connection in the .env file
```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lumen-crud
DB_USERNAME=root
DB_PASSWORD=secret
```

## 4. Run the migration and data seeding:
    php artisan migrate --seed
    
## 5. Run the project
    php -S localhost:8002 -t public
(adjust it with your desired port)
