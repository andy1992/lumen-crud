# lumen-crud
CRUD API sample, built with lumen. Used in react-native-crud and angular2-crud repositories.

# Installation
## 1. Clone this repository, or download .zip file.
    git clone https://github.com/andy1992/lumen-crud
    
## 2. On the project directory, run:
    composer install
(assuming you have composer installed)

## 3. Run the migration and data seeding:
    php artisan migrate --seed
    
## 4. Run the project
    php -S localhost:8002 -t public
(adjust it with your desired port)
