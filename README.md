# Create project 
```
composer create-project -s dev qunabu/wordpress-corcel PROJECT_NAME
```
# Install Wordpress
```
wget http://wordpress.org/latest.tar.gz

tar xfz latest.tar.gz

mv wordpress/* ./panel/wordpress

cp panel/wp-config-sample.php panel/wp-config.php
```

# Install local Laravel
```
cd laravel
php composer update
php artisan key:generate

cp api/.env.example api/.env

```

# Config database in the Laravel
```
#database wordpress
DB_HOST_WORDPRESS=db
DB_DATABASE_WORDPRESS=wordpress
DB_USERNAME_WORDPRESS=wordpress
DB_PASSWORD_WORDPRESS=wordpress

``` 

