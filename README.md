# Install Wordpress
```
wget http://wordpress.org/latest.tar.gz

tar xfz latest.tar.gz

mkdir panel/WordPress

mv wordpress/* ./panel/WordPress
```

# Install local Laravel
```
cd laravel
php composer update
php artisan key:generate
```