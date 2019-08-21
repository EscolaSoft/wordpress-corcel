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
```