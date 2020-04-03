# Stellar Development with Symfony 4
https://symfonycasts.com/screencast/symfony-fundamentals

[Stellar Development with Symfony 4](https://knpuniversity.com/screencast/symfony4)

## Setup
**Download Composer dependencies** (Make sure  [Composer is installed](https://getcomposer.org/download/))
and then run:
```
composer install
```

You may alternatively need to run `php composer.phar install`, depending
on how you installed Composer.

**Start the built-in web server**
```
php bin/console server:run
```

Now check out the site at `http://localhost:8000`

## Services
**Services**...Objects that do work

**Bundles** ...Symfonys Plugin system, providing Services

+ Services are stored in a **Container** Object
+ Services have internal names (e.g. "routes")
+ Bundles put services in container (`config/bundles.php`)
+ Symfony is "collection of services"



**Check** / **Show** installed bundles:
```angular2html
~$ composer show

~$ php bin/console debug:config
~$ php bin/console config:dump-reference
```

**Update** all bundles:
```angular2html
~$ composer require
```

**Security** check:
```angular2html
~$ symfony security:check
~$ composer install
```

## Markdown-Bundle

`composer require knplabs/knp-markdown-bundle`

+ **ArticleController.php**:
    + `public function show(..., MarkdownInterface $markdown) {...`
    + `$markdown->transform()`

+ **show.html.twig**
    + `{{ articleContent|raw }}`  ... 'raw' because XSS attacks prevented
    
## Cache Service
https://symfony.com/doc/current/cache.html  
https://symfony.com/doc/current/components/cache.html   
https://www.php-fig.org/psr/psr-6/

`cache.app` ...internal id of the cache-service (see auto-wiring)

+ **ArticleController.php**:
    + `public function show(..., AdapterInterface $cache) {...`
    + `$cache->getItem()`

## Configuration (Bundles
Check Bundles:
```angular2html
~$ php bin/console debug:config
```
#### Examples: 
**KnpMarkdownBundle**
+ dump bundle **config** ... `~$ ./bin/console config:dump KnpMarkdownBundle`
+ doc: https://github.com/KnpLabs/KnpMarkdownBundle
+ new file: 
    + `config/packages/knp_markdown.yaml` 
    + copy text for "light" version from docs
+ check `        dump($markdown);die;


**TwigBundle**
+ dump bundle **config** ... `~$ ./bin/console config:dump KnpMarkdownBundle`
+ doc: https://github.com/KnpLabs/KnpMarkdownBundle
+ new file: 
    + `config/packages/knp_markdown.yaml` 
    + copy text for "light" version from docs
+ check `        dump($markdown);die;

## debug:container & Cache Config
