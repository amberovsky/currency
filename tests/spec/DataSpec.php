<?php declare(strict_types=1);

namespace spec\Amberovsky\Money\Currency;

use PhpSpec\ObjectBehavior;

class DataSpec extends ObjectBehavior {
    public function it_sets_all_fields() {
        $this->beConstructedWith("description", 7, "XYZ", "P");

        $this->getDescription()->shouldReturn("description");
        $this->getMinorUnits()->shouldReturn(7);
        $this->getAlphaCode()->shouldReturn("XYZ");
        $this->getSymbol()->shouldReturn("P");
    }
}
