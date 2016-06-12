# Lvartisan 

## Laravel artisan command for creating view

This is just initial work on dev mode, the code structure may change and some extra option will be added soon.

### Require it

```
  composer require monirz/lvartisan
```


### Add the service provider to the config/app.php



```
 monirz\lvartisan\LvartisanServiceProvider::class 

```
Voila, You are done!



### Basic usages


```
  php artisan make:view articles/index
```

 The above example command  will create the articles directory in  views if the directory doesn't exist and the index.blade.php file in the articles directory.

```
  php artisan make:view index
```

With this command the directory name is not provided so the index.blade.php file will be created in root directory which is views.

