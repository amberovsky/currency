<?php declare(strict_types=1);
/**
 * Currency factory
 *
 * Copyright (C) Anton Zagorskii
 */

namespace Amberovsky\Money\Currency;

use Amberovsky\Money\Currency\Exception\UnknownAlphaCodeCurrencyException;
use Amberovsky\Money\Currency\Exception\UnknownNumericCodeCurrencyException;

class Factory {
    private ISO4217 $ISO4217;

    public function __construct(ISO4217 $ISO4217) {
        $this->ISO4217 = $ISO4217;
    }

    /**
     * @param int $numericCode
     *
     * @return Currency
     *
     * @throws UnknownNumericCodeCurrencyException
     */
    public function fromNumericCode(int $numericCode): Currency {
        return new Currency($numericCode, $this->ISO4217->getData($numericCode));
    }

    /**
     * @param string $alphaCode
     *
     * @return Currency
     *
     * @throws UnknownAlphaCodeCurrencyException
     */
    public function fromAlphaCode(string $alphaCode): Currency {
        $numericCode = $this->ISO4217->toNumericCode($alphaCode);
        return new Currency($numericCode, $this->ISO4217->getData($numericCode));
    }
}
