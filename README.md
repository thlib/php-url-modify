# php-url-modify
A simple URL helper

```php
<?php
$url = 'https://example.com';
$url = TH\UrlModify\Url::modifyQuery($url, ['a'=>1]); // https://example.com?a=1
$url = TH\UrlModify\Url::modifyQuery($url, ['a'=>2, 'b'=> 3]); // https://example.com?a=2&b=3
$url = TH\UrlModify\Url::modifyQuery($url, ['a'=>null]); // https://example.com?b=3

$url = TH\UrlModify\Url::modifyAnchor($url, 'newanchor'); // https://example.com#newanchor
$url = 'https://example.com#oldanchor';
$url = TH\UrlModify\Url::modifyAnchor($url, null); // https://example.com
$url = TH\UrlModify\Url::modifyAnchor($url, 'newanchor'); // https://example.com#newanchor
```

To run tests

```
vendor/phpunit/phpunit/phpunit --bootstrap vendor/autoload.php tests
```
