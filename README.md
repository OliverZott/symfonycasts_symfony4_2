# Stellar Development with Symfony 4
https://symfonycasts.com/screencast/symfony-fundamentals

[Stellar Development with Symfony 4](https://knpuniversity.com/screencast/symfony4)

## Table of Contents
1. [Setup](#setup)
2. [Services](#services)
3. [Markdown-Bundle](#markdown)
4. [Cache Service](#cache)
5. [Configuration (Bundles)](#config)
6. [debug:container & Cache Config](#debug)
7. [Environments & Config Files](#environments)


## Setup <a name="setup"></a>
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

## Services <a name="services"></a>
**Services**...Objects that do work

**Bundles** ...Symfonys Plugin system, providing Services

+ Services are stored in a **Container** Object
+ Services have internal names (e.g. "routes")
+ Bundles put services in container (`config/bundles.php`)
+ Symfony is "collection of services"

`config/bundles.php` = `php bin/console debug:config`

**Check** / **Show** installed / specific bundles:
```angular2html
~$ composer show

~$ php bin/console debug:


~$ php bin/console debug:config
~$ php bin/console config:dump-reference

~$ ./bin/console config:dump twig
~$ php bin/console debug:config twig
```


Show (all) Services in the **Container**
```angular2html
~$ ./bin/console debug:container 
~$ ./bin/console debug:container --show-private
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

## Markdown-Bundle  <a name="markdown"></a>

`composer require knplabs/knp-markdown-bundle`

+ **ArticleController.php**:
    + `public function show(..., MarkdownInterface $markdown) {...`
    + `$markdown->transform()`

+ **show.html.twig**
    + `{{ articleContent|raw }}`  ... 'raw' because XSS attacks prevented
    
## Cache Service <a name="cache"></a>
https://symfony.com/doc/current/cache.html  
https://symfony.com/doc/current/components/cache.html   
https://www.php-fig.org/psr/psr-6/

`cache.app` ...internal id of the cache-service (see auto-wiring)

+ **ArticleController.php**:
    + `public function show(..., AdapterInterface $cache) {...`
    + `$cache->getItem()`

## Configuration (Bundles)  <a name="config"></a>
Check Bundles:
```angular2html
~$ php bin/console debug:config
~$ ./bin/console config:dump twig
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

## debug:container & Cache Config <a name="debug"></a>
**Service ID** to a specific **service** in a **Container**.

+ `service: markdown.parser.light` in  **knp_markdown.yaml**
+ check: `./bin/console debug:autowiring`   
    + **MarkdownInterface** is now alias to `markdown.parser.light`     

All Services:
```angular2html
~$ ./bin/console debug:container --show-private
```
Most important Services:
```angular2html
~$ ./bin/console debug:autowiring
```


#### Example: Cache Service

See cache section under:
```angular2html
~$ ./bin/console config:dump framework
~$ ./bin/console debug:config framework
```

## Environments & Config Files  <a name="environments"></a>
Configuration: 
+ log-behavior: log errors / all; where ti log?
+ Database credentials 

### Environments:
2 Environments in Symfony: **dev** and **prod**
    
    
    
## Remarks
+ Container is full of Services
+ Each Service has ID
+ *debug:autowiring* shows most important services
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    