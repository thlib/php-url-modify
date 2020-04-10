# php-url
A simple URL helper

```php
<?php
$url = 'https://example.com';
$url = TH\Url\Url::modifyQuery($url, ['a'=>1]); // https://example.com?a=1
$url = TH\Url\Url::modifyQuery($url, ['a'=>2, 'b'=> 3]); // https://example.com?a=2&b=3
$url = TH\Url\Url::modifyQuery($url, ['a'=>null]); // https://example.com?b=3
```