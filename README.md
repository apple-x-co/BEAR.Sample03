# BEAR.Sample03

`bear/query-repository 1.6.5` `@Cacheable` 動作検証

ある環境では、以下のエラーが発生したが、再現ができなかった。
もしかすると、本検証では `bear/query-repository (1.6.7)` が入ったことで起きなかったかもしれない。

```
PHP Fatal error:  Uncaught TypeError: strtotime() expects parameter 1 to be string, null given in /path/to/vendor/bear/query-repository/src/QueryRepository.php:81
```

## 手順

1. BEAR.Sunday の雛形をインストール

```bash
composer create-project -n bear/skeleton BEAR.Sample03 --no-dev
```

```
Installing bear/skeleton (1.7.5)
  - Installing bear/skeleton (1.7.5): Downloading (100%)
Created project in BEAR.Sample03
```

2. リクエスト確認

```bash
php ./bin/page.php get /
```

結果

```
200 OK
Content-Type: application/hal+json

{
    "greeting": "Hello BEAR.Sunday",
    "_links": {
        "self": {
            "href": "/index"
        }
    }
}
```

3. `MyVendor\MyProject\Resource\Page\Index` に `@Cacheable` を付ける

```php
/**
 * Class Index
 * @package MyVendor\MyProject\Resource\Page
 *
 * @Cacheable()
 */
class Index extends ResourceObject
```

4. 再度、リクエスト確認

```bash
php ./bin/page.php get /
```

結果

```
200 OK
Content-Type: application/hal+json
ETag: 2842980848
Last-Modified: Sat, 16 May 2020 02:25:33 GMT
Cache-Control: max-age=31536000

{
    "greeting": "Hello BEAR.Sunday",
    "_links": {
        "self": {
            "href": "/index"
        }
    }
}
```