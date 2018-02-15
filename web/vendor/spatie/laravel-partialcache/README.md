# Laravel Cache Partial Blade Directive

[![Latest Version on Packagist](https://img.shields.io/packagist/v/spatie/laravel-partialcache.svg?style=flat-square)](https://packagist.org/packages/spatie/laravel-partialcache)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/a6720e85-6e6d-4f1e-aeb5-2933c3fc8603.svg?style=flat-square)](https://insight.sensiolabs.com/projects/a6720e85-6e6d-4f1e-aeb5-2933c3fc8603)
[![Quality Score](https://img.shields.io/scrutinizer/g/spatie/laravel-partialcache.svg?style=flat-square)](https://scrutinizer-ci.com/g/spatie/laravel-partialcache)
[![Total Downloads](https://img.shields.io/packagist/dt/spatie/laravel-partialcache.svg?style=flat-square)](https://packagist.org/packages/spatie/laravel-partialcache)

This package provides a Blade directive for Laravel >=5.1 to cache rendered partials in Laravel.

Spatie is a webdesign agency in Antwerp, Belgium. You'll find an overview of all our open source projects [on our website](https://spatie.be/opensource).

## Install

You can install the package via Composer:

```bash
$ composer require spatie/laravel-partialcache
```

Start by registering the package's service provider and facade:

```php
// config/app.php

'providers' => [
  ...
  Spatie\PartialCache\PartialCacheServiceProvider::class,
],

'aliases' => [
  ...
  'PartialCache' => Spatie\PartialCache\PartialCacheFacade::class,
],
```

*The facade is optional, but the rest of this guide assumes you're using it.*

Optionally publish the config files:

```bash
$ php artisan vendor:publish --provider="Spatie\PartialCache\PartialCacheServiceProvider"
```

## Postcardware

You're free to use this package (it's [MIT-licensed](LICENSE.md)), but if it makes it to your production environment you are required to send us a postcard from your hometown, mentioning which of our package(s) you are using.

Our address is: Spatie, Samberstraat 69D, 2060 Antwerp, Belgium.

The best postcards will get published on the open source page on our website.

## Usage

The package registers a blade directive, `@cache`. The cache directive accepts the same arguments as `@include`, plus optional parameters for the amount of minutes a view should be cached for, a key unique to the rendered view, and a cache tag for the rendered view. If no minutes are provided, the view will be remembered until you manually remove it from the cache.

Note that this caches the rendered html, not the rendered php like blade's default view caching.

```
{{-- Simple example --}}
@cache('footer.section.partial')

{{-- With extra view data --}}
@cache('products.card', ['product' => $category->products->first()])

{{-- For a certain time --}}
{{-- (cache will invalidate in 60 minutes in this example, set null to remember forever) --}}
@cache('homepage.news', null, 60)

{{-- With an added key (cache entry will be partialcache.user.profile.{$user->id}) --}}
@cache('user.profile', null, null, $user->id)

{{-- With an added tag (only supported by memcached and others) }}
@cache('user.profile', null, null, $user->id, 'userprofiles')

{{-- With array of tags (only supported by memcached and others) }}
@cache('user.profile', null, null, $user->id, ['user', 'profile', 'location'])
```

### Clearing The PartialCache

You can forget a partialcache entry with `PartialCache::forget($view, $key)`.

```php
PartialCache::forget('user.profile', $user->id);
```

If you want to flush all entries, you'll need to either call `PartialCache::flush()` (note: this is only supported by drivers that support tags), or clear your entire cache.

### Configuration

Configuration isn't necessary, but there are two options specified in the config file:

- `partialcache.enabled`: Fully enable or disable the cache. Defaults to `true`.
- `partialcache.directive`: The name of the blade directive to register. Defaults to `cache`.
- `partialcache.key`: The base key that used for cache entries. Defaults to `partialcache`.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email freek@spatie.be instead of using the issue tracker.

## Credits

- [Sebastian De Deyne](https://github.com/sebastiandedeyne)
- [All Contributors](../../contributors)

## About Spatie
Spatie is a webdesign agency in Antwerp, Belgium. You'll find an overview of all our open source projects [on our website](https://spatie.be/opensource).

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
