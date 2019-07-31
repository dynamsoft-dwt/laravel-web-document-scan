# laravel-web-document-scan
The sample shows how to build a web application to scan and upload documents using [Laravel](https://laravel.com) and [Dynamic Web TWAIN SDK](https://www.dynamsoft.com/Products/WebTWAIN_Overview.aspx).

## Installation
- [Composer](https://getcomposer.org/download/)
- Laravel:
    
    ```
    composer global require laravel/installer
    ```

## Usage

Enable `fileinfo` extension in `php.ini`:

![php fileinfo extension](https://www.codepool.biz/wp-content/uploads/2019/08/php-ini-extension.png)

Get a [free 30-day trial license](https://www.dynamsoft.com/CustomerPortal/Portal/Triallicense.aspx) of Dynamic Web TWAIN.

Set the license in `resources\views\dwt_upload.blade.php`:

```php
Dynamsoft.WebTwainEnv.ProductKey = "YOUR-LICENSE-KEY";
```

Run the web server:

```
php artisan serve
```

Open `http://127.0.0.1:8000/dwt_upload` in your web browser.

![php fileinfo extension](https://www.codepool.biz/wp-content/uploads/2019/08/laravel-web-document-scan.png)

## Reference
- https://laravel.com/docs/5.8

## Blog
[Uploading Scanned Documents in Windows 10 Laravel Project](https://www.codepool.biz/upload-document-image-laravel-windows.html)
