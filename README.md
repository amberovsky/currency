# Currency

A simple [ISO-4217](https://en.wikipedia.org/wiki/ISO_4217) comprehensive Currency class with PSR-16 caching

### How to use

Please provision `Currency\Factory` with any PSR-16 implementation (for example, [Symfony cache](https://symfony.com/doc/current/components/cache.html))

```php
use Amberovsky\Money\Currency;

$factory = new CurrencyFactory(new ISO4217(), new PSR16Cache());

$usd = $factory->fromNumericCode(ISO4217::NUMERIC_USD);

// or

$usd = $factory->fromAlphaCode(ISO4217::ALPHA_USD);

// then

$usd->getNumericCode(); // 809
$usd->getDescription(); // US Dollar
$usd->getMinorUnits(); // 2
$usd->getAlphaCode(); // USD
$usd->getSymbol(); // $

// also, these methods could be useful
ISO4217::toNumericCode(string $alphaCode): int
ISO4217::toAlphaCode(int $numericCode): string
```

### Integration with Doctrine

Please use [amberovsky/currency-doctrine](https://github.com/amberovsky/currency-doctrine) if you need doctrine integration. It provides doctrine mapping type for `Currency`

### How to contribute

Please fork this repo and create a PR. Make sure you run tests before submitting  yout PR:

```shell script
make phpstan
make psalm
make phpspec
```

### License
Copyright (C) 2020 Anton Zagorskii, BSD-3-Clause license, See [license file](/LICENSE.txt) for details
