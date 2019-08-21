# Install Wordpress
```
wget http://wordpress.org/latest.tar.gz

tar xfz latest.tar.gz


mv wordpress/* ./panel/wordpress
```

# Install local Laravel
```
cd laravel
php composer update
php artisan key:generate
```