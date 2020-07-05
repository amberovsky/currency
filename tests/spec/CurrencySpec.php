<?php declare(strict_types=1);
/**
 * Copyright (C) Anton Zagorskii
 */

namespace spec\Amberovsky\Money\Currency;

use Amberovsky\Money\Currency\Currency;
use PhpSpec\ObjectBehavior;

class CurrencySpec extends ObjectBehavior {
    public function let() {
        $this->beConstructedWith(123, "description", 7, "XYZ", "$");
    }

    public function it_returns_numeric_code() {
        $this->getNumericCode()->shouldReturn(123);
    }

    public function it_returns_alpha_code() {
        $this->getAlphaCode()->shouldReturn('XYZ');
    }

    public function it_returns_minor_units() {
        $this->getMinorUnits()->shouldReturn(7);
    }

    public function it_returns_description() {
        $this->getDescription()->shouldReturn('description');
    }

    public function it_returns_symbol() {
        $this->getSymbol()->shouldReturn('$');
    }

    public function it_serializes() {
        $this->serialize()->shouldBeString();
    }

    public function it_unserializes() {
        $currency = new Currency(
            999, "extra description", 7, "ZZZ", "@"
        );
        $this->unserialize($currency->serialize());

        $this->getNumericCode()->shouldBeEqualTo($currency->getNumericCode());
        $this->getDescription()->shouldBeEqualTo($currency->getDescription());
        $this->getMinorUnits()->shouldBeEqualTo($currency->getMinorUnits());
        $this->getAlphaCode()->shouldBeEqualTo($currency->getAlphaCode());
        $this->getSymbol()->shouldBeEqualTo($currency->getSymbol());
    }

    public function it_throws_RuntimeException_during_unserialize_on_malformed_data() {
        $this->shouldThrow(\RuntimeException::class)->duringUnserialize("hello");
    }
}
