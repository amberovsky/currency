<?php declare(strict_types=1);
/**
 * Copyright (C) Anton Zagorskii
 */

namespace spec\Amberovsky\Money\Currency;

use Amberovsky\Money\Currency\Exception\UnknownAlphaCodeCurrencyException;
use Amberovsky\Money\Currency\Exception\UnknownNumericCodeCurrencyException;
use Amberovsky\Money\Currency\ISO4217;
use PhpSpec\ObjectBehavior;

class ISO4217Spec extends ObjectBehavior {
    public function it_throws_UnknownNumericCodeCurrencyException_during_getData_on_wrong_numberCode() {
        $this->shouldThrow(UnknownNumericCodeCurrencyException::class)->duringGetData(1000);
    }

    public function it_returns_Data_without_symbol_in_getData() {
        $data = $this->getData(ISO4217::NUMERIC_RUB);

        $data->shouldBeArray();
        $data->shouldHaveKeyWithValue(ISO4217::KEY_DESCRIPTION, "Russian Ruble");
        $data->shouldHaveKeyWithValue(ISO4217::KEY_ALPHA_CODE, ISO4217::ALPHA_RUB);
        $data->shouldHaveKeyWithValue(ISO4217::KEY_MINOR_UNITS, 2);

        $data->shouldNotHaveKey(ISO4217::KEY_SYMBOL);
    }

    public function it_returns_Data_with_symbol_in_getData() {
        $data = $this->getData(ISO4217::NUMERIC_USD);

        $data->shouldBeArray();
        $data->shouldHaveKeyWithValue(ISO4217::KEY_DESCRIPTION, "US Dollar");
        $data->shouldHaveKeyWithValue(ISO4217::KEY_ALPHA_CODE, ISO4217::ALPHA_USD);
        $data->shouldHaveKeyWithValue(ISO4217::KEY_MINOR_UNITS, 2);
        $data->shouldHaveKeyWithValue(ISO4217::KEY_SYMBOL, "$");
    }

    public function it_throws_UnknownNumericCodeCurrencyException_during_validateNumericCode_on_invalid_numericCode() {
        $this->shouldThrow(UnknownNumericCodeCurrencyException::class)->duringValidateNumericCode(1000);
    }

    public function it_returns_numericCode_during_validateNumericCode() {
        $this->validateNumericCode(ISO4217::NUMERIC_AED)->shouldReturn(ISO4217::NUMERIC_AED);
    }

    public function it_throws_UnknownAlphaCodeCurrencyException_during_toNumericCode_on_invalid_alphaCode() {
        $this->shouldThrow(UnknownAlphaCodeCurrencyException::class)->duringToNumericCode("XYZ");
    }

    public function it_returns_numericCode_in_toNumericCode() {
        $this->toNumericCode(ISO4217::ALPHA_AED)->shouldReturn(ISO4217::NUMERIC_AED);
    }
}
