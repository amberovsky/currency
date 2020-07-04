<?php declare(strict_types=1);
/**
 * Thrown when an unknown numeric code was provided
 *
 * Copyright (C) Anton Zagorskii
 */

namespace Amberovsky\Money\Currency\Exception;

use Throwable;

class UnknownNumericCodeCurrencyException extends CurrencyException {
    public function __construct(string $unknownNumericCode, Throwable $previous = null) {
        parent::__construct('Unknown numeric code: ' . $unknownNumericCode, 0, $previous);
    }
}
