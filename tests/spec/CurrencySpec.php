<?php declare(strict_types=1);

namespace spec\Amberovsky\Money\Currency;

use Amberovsky\Money\Currency\Data;
use PhpSpec\ObjectBehavior;

class CurrencySpec extends ObjectBehavior {
    public function let(Data $data) {
        $this->beConstructedWith(123, $data);
    }

    public function it_returns_numeric_code() {
        $this->getNumericCode()->shouldReturn(123);
    }

    public function it_returns_alpha_code(Data $data) {
        $data->getAlphaCode()->shouldBeCalled()->willReturn('alpha');

        $this->getAlphaCode()->shouldReturn('alpha');
    }

    public function it_returns_minor_units(Data $data) {
        $data->getMinorUnits()->shouldBeCalled()->willReturn(2);

        $this->getMinorUnits()->shouldReturn(2);
    }

    public function it_returns_description(Data $data) {
        $data->getDescription()->shouldBeCalled()->willReturn('description');

        $this->getDescription()->shouldReturn('description');
    }

    public function it_returns_symbol(Data $data) {
        $data->getSymbol()->shouldBeCalled()->willReturn('Q');

        $this->getSymbol()->shouldReturn('Q');
    }
}
