# Laravel Web Document Scan
The sample shows how to build a web application to scan and upload documents using [Laravel](https://laravel.com) and [Dynamic Web TWAIN SDK](https://www.dynamsoft.com/web-twain/overview/).

## Installation
- [Composer](https://getcomposer.org/download/)
- Laravel v5.8:
    
    ```
    composer global require laravel/installer
    ```
- [Dynamic Web TWAIN SDK v17.1](https://www.dynamsoft.com/web-twain/downloads/). Copy Dynamic Web TWAIN `Resources` folder to the `public` folder of the project.
- [PHP 7.x](https://www.php.net/downloads.php) 

## Usage

Enable `fileinfo` extension in `php.ini`:

![php fileinfo extension](https://www.codepool.biz/wp-content/uploads/2019/08/php-ini-extension.png)

Get a [30-day FREE Trial license](https://www.dynamsoft.com/customer/license/trialLicense?product=dwt) of Dynamic Web TWAIN and update the license key in `resources\views\dwt_upload.blade.php`:

```php
Dynamsoft.DWT.ProductKey = "YOUR-LICENSE-KEY";
```

Run the web server:

```
composer update
composer install
php artisan serve
```

Open `http://127.0.0.1:8000/dwt_upload` in your web browser.

![php fileinfo extension](https://www.codepool.biz/wp-content/uploads/2019/08/laravel-web-document-scan.png)

## Reference
- https://laravel.com/docs/5.8

## Blog
[Uploading Scanned Documents in Windows 10 Laravel Project](https://www.codepool.biz/upload-document-image-laravel-windows.html)
