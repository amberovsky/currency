<?php declare(strict_types=1);
/**
 * Additional currency data
 *
 * Copyright (C) Anton Zagorskii
 */

namespace Amberovsky\Money\Currency;

class Data {
    /** @var string currency description */
    private string $description;

    /** @var int minor units (exponent) */
    private int $minorUnits;

    /** @var string 3-chars alphabetic code */
    private string $alphaCode;

    /** @var string currency symbol */
    private string $symbol;

    /**
     * @param string $description currency description
     * @param int $minorUnits minor units (exponent)
     * @param string $alphaCode 3-chars alphabetic code
     * @param string $symbol currency symbol
     */
    public function __construct(string $description, int $minorUnits, string $alphaCode, string $symbol) {
        $this->description = $description;
        $this->minorUnits = $minorUnits;
        $this->alphaCode = $alphaCode;
        $this->symbol = $symbol;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getMinorUnits(): int {
        return $this->minorUnits;
    }

    public function getAlphaCode(): string {
        return $this->alphaCode;
    }

    public function getSymbol(): string {
        return $this->symbol;
    }
}
