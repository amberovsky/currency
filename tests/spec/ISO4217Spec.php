<?php declare(strict_types=1);

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
        $data = $this->getData(ISO4217::RUB);

        $data->getDescription()->shouldReturn("Russian Ruble");
        $data->getMinorUnits()->shouldReturn(2);
        $data->getAlphaCode()->shouldReturn("RUB");
        $data->getSymbol()->shouldReturn("");
    }

    public function it_returns_Data_with_symbol_in_getData() {
        $data = $this->getData(ISO4217::USD);

        $data->getDescription()->shouldReturn("US Dollar");
        $data->getMinorUnits()->shouldReturn(2);
        $data->getAlphaCode()->shouldReturn("USD");
        $data->getSymbol()->shouldReturn("$");
    }

    public function it_throws_UnknownNumericCodeCurrencyException_during_validateNumericCode_on_invalid_numericCode() {
        $this->shouldThrow(UnknownNumericCodeCurrencyException::class)->duringValidateNumericCode(1000);
    }

    public function it_returns_numericCode_during_validateNumericCode() {
        $this->validateNumericCode(ISO4217::AED)->shouldReturn(ISO4217::AED);
    }

    public function it_throws_UnknownAlphaCodeCurrencyException_during_toNumericCode_on_invalid_alphaCode() {
        $this->shouldThrow(UnknownAlphaCodeCurrencyException::class)->duringToNumericCode("XYZ");
    }

    public function it_returns_numericCode_in_toNumericCode() {
        $this->toNumericCode("AED")->shouldReturn(ISO4217::AED);
    }
}
