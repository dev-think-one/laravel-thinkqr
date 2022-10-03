# Laravel think kit.

![Packagist License](https://img.shields.io/packagist/l/yaroslawww/laravel-thinkqr?color=%234dc71f)
[![Packagist Version](https://img.shields.io/packagist/v/yaroslawww/laravel-thinkqr)](https://packagist.org/packages/yaroslawww/laravel-thinkqr)
[![Total Downloads](https://img.shields.io/packagist/dt/yaroslawww/laravel-thinkqr)](https://packagist.org/packages/yaroslawww/laravel-thinkqr)
[![Build Status](https://scrutinizer-ci.com/g/yaroslawww/laravel-thinkqr/badges/build.png?b=main)](https://scrutinizer-ci.com/g/yaroslawww/laravel-thinkqr/build-status/main)
[![Code Coverage](https://scrutinizer-ci.com/g/yaroslawww/laravel-thinkqr/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/yaroslawww/laravel-thinkqr/?branch=main)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/yaroslawww/laravel-thinkqr/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/yaroslawww/laravel-thinkqr/?branch=main)

Wrapper for qrcode functionality.

## Installation

Install the package via composer:

```bash
composer require yaroslawww/laravel-thinkqr
```

Optionally you can publish the config file with:

```bash
php artisan vendor:publish --provider="ThinkQR\ServiceProvider" --tag="config"
```

## Usage

```php
use ThinkQR\Image\QrCodeImageForPdf;

$pdf = new Fpdi();

$pdf->Image(QrCodeImageForPdf::make('https://example.com/foo-bar-baz', [
            'render_size' => 200,
            'margin' => 2,
        ])->filePath(), 0, 0, 30);

```

## Credits

- [![Think Studio](https://yaroslawww.github.io/images/sponsors/packages/logo-think-studio.png)](https://think.studio/) 
