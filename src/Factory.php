<?php declare(strict_types=1);
/**
 * Currency factory
 *
 * Copyright (C) Anton Zagorskii
 */

namespace Amberovsky\Money\Currency;

use Amberovsky\Money\Currency\Exception\UnknownAlphaCodeCurrencyException;
use Amberovsky\Money\Currency\Exception\UnknownNumericCodeCurrencyException;
use Psr\SimpleCache\CacheInterface;

class Factory {
    private ISO4217 $ISO4217;
    private CacheInterface $cache;

    public function __construct(ISO4217 $ISO4217, CacheInterface $cache) {
        $this->ISO4217 = $ISO4217;
        $this->cache = $cache;
    }

    /**
     * @param int $numericCode
     *
     * @return string key name for caching
     */
    protected function getKeyName(int $numericCode): string {
        return "pro.amberovsky.money.currency." . $numericCode;
    }

    /**
     * @param int $numericCode
     *
     * @return Currency
     *
     * @throws UnknownNumericCodeCurrencyException
     */
    public function fromNumericCode(int $numericCode): Currency {
        $keyName = $this->getKeyName($numericCode);
        /** @var null|Currency $currency */
        $currency = $this->cache->get($keyName);
        if (is_null($currency)) {
            $data = $this->ISO4217->getData($numericCode);
            $currency = new Currency(
                $numericCode,
                (string) $data[ISO4217::KEY_DESCRIPTION],
                (int) $data[ISO4217::KEY_MINOR_UNITS],
                (string) $data[ISO4217::KEY_ALPHA_CODE],
                (string) ($data[ISO4217::KEY_SYMBOL] ?? '')
            );

            $this->cache->set($keyName, $currency);
        }

        return $currency;
    }

    /**
     * @param string $alphaCode
     *
     * @return Currency
     *
     * @throws UnknownAlphaCodeCurrencyException
     */
    public function fromAlphaCode(string $alphaCode): Currency {
        return $this->fromNumericCode($this->ISO4217->toNumericCode($alphaCode));
    }
}
