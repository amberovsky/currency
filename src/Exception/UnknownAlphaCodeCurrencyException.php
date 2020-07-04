<?php declare(strict_types=1);
/**
 * Thrown when an unknown alpha code was provided
 *
 * Copyright (C) Anton Zagorskii
 */

namespace Amberovsky\Money\Currency\Exception;

use Throwable;

class UnknownAlphaCodeCurrencyException extends CurrencyException {
    public function __construct(string $unknownAlphaCode, Throwable $previous = null) {
        parent::__construct('Unknown alpha code: ' . $unknownAlphaCode, 0, $previous);
    }
}
