# Lvartisan 

## Laravel artisan command for creating view

### Require it

```
  composer require monirz/lvartisan
```


### Add the service provider to the config/app.php



```
 monirz\lvartisan\LvartisanServiceProvider 

```
Viola, You are done!



### Basic usages

For creating a index view in articles

```
  php artisan make:view articles/index
```

For the above example command it will create the articles directory in  views if the directory doesn't exist and the index.blade.php file in articles.

```
  php artisan make:view index
```

With this command directory is not provided so the index.blade.php file will be created in root directory which is views

