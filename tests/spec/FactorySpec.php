<?php declare(strict_types=1);

namespace spec\Amberovsky\Money\Currency;

use Amberovsky\Money\Currency\Data;
use Amberovsky\Money\Currency\Exception\UnknownAlphaCodeCurrencyException;
use Amberovsky\Money\Currency\Exception\UnknownNumericCodeCurrencyException;
use Amberovsky\Money\Currency\ISO4217;
use PhpSpec\ObjectBehavior;

class FactorySpec extends ObjectBehavior {
    public function let(ISO4217 $ISO4217, Data $data) {
        $this->beConstructedWith($ISO4217);
    }

    public function it_creates_currency_from_numeric_code(ISO4217 $ISO4217, Data $data) {
        $ISO4217->getData(999)->shouldBeCalled()->willReturn($data);

        $currency = $this->fromNumericCode(999);
        $currency->getNumericCode()->shouldReturn(999);
    }

    public function it_throws_UnknownNumericCodeCurrencyException_during_fromNumericCode(ISO4217 $ISO4217) {
        $ISO4217->getData(999)->shouldBeCalled()->willThrow(new UnknownNumericCodeCurrencyException("999"));
        $this->shouldThrow(UnknownNumericCodeCurrencyException::class)->duringFromNumericCode(999);
    }

    public function it_creates_currency_from_alpha_code(ISO4217 $ISO4217, Data $data) {
        $ISO4217->toNumericCode("XYZ")->shouldBeCalled()->willReturn(777);
        $ISO4217->getData(777)->shouldBeCalled()->willReturn($data);

        $currency = $this->fromAlphaCode("XYZ");
        $currency->getNumericCode()->shouldReturn(777);
    }

    public function it_throws_UnknownAlphaCodeCurrencyException_during_fromAlphaCode(ISO4217 $ISO4217) {
        $ISO4217->toNumericCode("XYZ")->shouldBeCalled()->willThrow(new UnknownAlphaCodeCurrencyException("XYZ"));
        $ISO4217->getData(999)->shouldNotBeCalled();
        $this->shouldThrow(UnknownAlphaCodeCurrencyException::class)->duringFromAlphaCode("XYZ");
    }

}
