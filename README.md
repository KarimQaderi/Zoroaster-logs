## Zoroaster Log Viewer

![screenshot 1](https://raw.githubusercontent.com/KarimQaderi/Zoroaster-logs/master/1.png)

![screenshot 2](https://raw.githubusercontent.com/KarimQaderi/Zoroaster-logs/master/2.png)

## نصب 

فایل composer.json باز کنید و کد زیر رو قرار دهید :

```json
    "require": {
        "karim-qaderi/zoroaster-logs": "*"
    },
    "repositories": [
        {
            "type": "git",
            "url": "https://github.com/KarimQaderi/Zoroaster-logs.git"
        }
    ],
```

```bash
composer update

php artisan vendor:publish --tag=Zoroaster-filemanager-assets

```

## سطع دسترسی 

برای اینکه سطع دسترسی رو بزارید فایل `app/Providers/ZoroasterServiceProvider.php` رو باز کنید کد زیر رو در `boot` قرار دهید. 

```php
/**
 * Bootstrap any application services.
 *
 * @return void
 */
protected function boot()
{
    Gate::define('Zoroaster-log-viewer', function ($user) {
        return in_array($user->email, [
            'karimqaderi1@gmail.com',
        ]);
    });
}
```