[![Latest Stable Version](https://poser.pugx.org/ublaboo/https-redirect-nette-extension/v/stable)](https://packagist.org/packages/ublaboo/https-redirect-nette-extension)
[![License](https://poser.pugx.org/ublaboo/https-redirect-nette-extension/license)](https://packagist.org/packages/ublaboo/https-redirect-nette-extension)
[![Total Downloads](https://poser.pugx.org/ublaboo/https-redirect-nette-extension/downloads)](https://packagist.org/packages/ublaboo/https-redirect-nette-extension)
[![Gitter](https://img.shields.io/gitter/room/nwjs/nw.js.svg)](https://gitter.im/ublaboo/help)

HttpsRedirectNetteExtension
===========================

1, Install via composer
```yaml
composer require ublaboo/https-redirect-nette-extension
```


2, Register extension in `config.neon`:

```php
extensions:
	httpsRedirect: Ublaboo\HttpsRedirectNetteExtension\DI\HttpsRedirectNetteExtension
```

3, Tell which presenters shoul be secured (in case no presenter name given, all presenters are secured). Format - `Module:Module:Presenter`:

```php
httpsRedirect:
	redirectTo: https # Set ot "http" for redirecting from https to http
	redirectCode: 301 # Change it to any other code you want,
	enable: true # or false :P
```
