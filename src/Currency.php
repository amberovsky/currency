<?php declare(strict_types=1);
/**
 * Currency
 *
 * Copyright (C) Anton Zagorskii
 */

namespace Amberovsky\Money\Currency;

class Currency {
    /** @var int numeric code */
    private int $numericCode;

    /** @var Data additional currency data */
    private Data $data;

    /**
     * @param int $numericCode numeric code
     * @param Data $data additional currency data
     */
    public function __construct(int $numericCode, Data $data) {
        $this->numericCode = $numericCode;
        $this->data = $data;
    }

    public function getNumericCode(): int {
        return $this->numericCode;
    }

    public function getAlphaCode(): string {
        return $this->data->getAlphaCode();
    }

    public function getMinorUnits(): int {
        return $this->data->getMinorUnits();
    }

    public function getDescription(): string {
        return $this->data->getDescription();
    }

    public function getSymbol(): string {
        return $this->data->getSymbol();
    }
}
