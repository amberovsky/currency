<?php declare(strict_types=1);
/**
 * Currency
 *
 * Copyright (C) Anton Zagorskii
 */

namespace Amberovsky\Money\Currency;

use RuntimeException;
use Serializable;

class Currency implements Serializable {
    private const
        FIELD_NUMERIC_CODE  = 0,
        FIELD_DESCRIPTION   = 1,
        FIELD_MINOR_UNTIS   = 2,
        FIELD_ALPHA_CODE    = 3,
        FIELD_SYMBOL        = 4;

    /** @var int numeric code */
    private int $numericCode;

    /** @var string currency description */
    private string $description;

    /** @var int minor units (exponent) */
    private int $minorUnits;

    /** @var string 3-chars alphabetic code */
    private string $alphaCode;

    /** @var string currency symbol */
    private string $symbol;

    /**
     * @param int $numericCode numeric code
     * @param string $description currency description
     * @param int $minorUnits minor units (exponent)
     * @param string $alphaCode 3-chars alphabetic code
     * @param string $symbol currency symbol
     */
    public function __construct(
        int $numericCode, string $description, int $minorUnits, string $alphaCode, string $symbol
    ) {
        $this->numericCode = $numericCode;
        $this->description = $description;
        $this->minorUnits = $minorUnits;
        $this->alphaCode = $alphaCode;
        $this->symbol = $symbol;
    }

    public function getNumericCode(): int {
        return $this->numericCode;
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

    /**
     * @inheritDoc
     */
    public function serialize(): string {
        $result = json_encode([
            self::FIELD_NUMERIC_CODE    => $this->getNumericCode(),
            self::FIELD_DESCRIPTION     => $this->getDescription(),
            self::FIELD_MINOR_UNTIS     => $this->getMinorUnits(),
            self::FIELD_ALPHA_CODE      => $this->getAlphaCode(),
            self::FIELD_SYMBOL          => $this->getSymbol(),
        ]);

        if ($result === false) throw new RuntimeException("Unable to serialize Currency");

        return $result;
    }

    /**
     * @inheritDoc
     */
    public function unserialize($serialized): void {
        /** @var mixed|array{0: int, 1: int, 2: int, 3: ISO4217::ALPHA_*, 4: string} $data */
        $data = @json_decode((string) $serialized, true);
        if ((json_last_error() != JSON_ERROR_NONE) || !is_array($data)) {
            throw new RuntimeException("Can not unserialize Currency, json error code: " . json_last_error());
        }

        $this->numericCode = (int) $data[self::FIELD_NUMERIC_CODE];
        $this->description = (string) $data[self::FIELD_DESCRIPTION];
        $this->minorUnits = (int) $data[self::FIELD_MINOR_UNTIS];
        $this->alphaCode = (string) $data[self::FIELD_ALPHA_CODE];
        $this->symbol = (string) $data[self::FIELD_SYMBOL];
    }
}
