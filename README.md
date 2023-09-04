# Laravel think kit.

![Packagist License](https://img.shields.io/packagist/l/think.studio/laravel-thinkqr?color=%234dc71f)
[![Packagist Version](https://img.shields.io/packagist/v/think.studio/laravel-thinkqr)](https://packagist.org/packages/think.studio/laravel-thinkqr)
[![Total Downloads](https://img.shields.io/packagist/dt/think.studio/laravel-thinkqr)](https://packagist.org/packages/think.studio/laravel-thinkqr)
[![Build Status](https://scrutinizer-ci.com/g/dev-think-one/laravel-thinkqr/badges/build.png?b=main)](https://scrutinizer-ci.com/g/dev-think-one/laravel-thinkqr/build-status/main)
[![Code Coverage](https://scrutinizer-ci.com/g/dev-think-one/laravel-thinkqr/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/dev-think-one/laravel-thinkqr/?branch=main)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/dev-think-one/laravel-thinkqr/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/dev-think-one/laravel-thinkqr/?branch=main)

Wrapper for qrcode functionality.

## Installation

Install the package via composer:

```bash
composer require think.studio/laravel-thinkqr
```

Optionally you can publish the config file with:

```bash
php artisan vendor:publish --provider="ThinkQR\ServiceProvider" --tag="config"
```

## Usage

```php
$qrCode = \ThinkQR\QRCode::make('foo');
// or
$qrCode = \ThinkQR\QRCode::make('foo', [
    'render_size' => 300,
    'margin' => 10,
]);

$qrCode->getSvgString(); // XML svg string
$qrCode->getPngString(); // Binary png string (you can encode to base64 and use as data image)

// Save Files
$qrCode->writeSvgFile('my/path/file.svg');
$qrCode->writePngFile('my/path/file.png');
```

Create tmp image for insert to some dynamic script like pdf.

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
