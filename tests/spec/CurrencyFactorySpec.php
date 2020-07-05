<?php declare(strict_types=1);
/**
 * Copyright (C) Anton Zagorskii
 */

namespace spec\Amberovsky\Money\Currency;

use Amberovsky\Money\Currency\Currency;
use Amberovsky\Money\Currency\Exception\UnknownAlphaCodeCurrencyException;
use Amberovsky\Money\Currency\Exception\UnknownNumericCodeCurrencyException;
use Amberovsky\Money\Currency\ISO4217;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Psr\SimpleCache\CacheInterface;

class CurrencyFactorySpec extends ObjectBehavior {
    public function let(ISO4217 $ISO4217, CacheInterface $cache) {
        $this->beConstructedWith($ISO4217, $cache);
    }

    public function it_creates_currency_using_ISO4217_getData_if_it_is_not_cached(ISO4217 $ISO4217, CacheInterface $cache) {
        $cache->get(Argument::any())->shouldBeCalled()->willReturn(null);
        $cache->set(Argument::any(), Argument::any())->shouldBeCalled()->willReturn(true);
        $ISO4217->getData(999)->shouldBeCalled()->willReturn([
            ISO4217::KEY_DESCRIPTION    => "description",
            ISO4217::KEY_ALPHA_CODE     => "XYZ",
            ISO4217::KEY_MINOR_UNITS    => 7,
            ISO4217::KEY_SYMBOL         => "W",
        ]);

        $currency = $this->fromNumericCode(999);
        $currency->getNumericCode()->shouldReturn(999);

        $cache->get(Argument::any())->shouldHaveBeenCalledOnce();
        $cache->set(Argument::any(), Argument::any())->shouldHaveBeenCalledOnce();
    }

    public function it_reuses_cache(ISO4217 $ISO4217, CacheInterface $cache, Currency $currency) {
        $currency->getNumericCode()->shouldBeCalled()->willReturn(999);

        $cache->get(Argument::any())->shouldBeCalled()->willReturn($currency);
        $cache->set(Argument::any(), Argument::any())->shouldNotBeCalled();
        $ISO4217->getData(999)->shouldNotBeCalled();

        $currency = $this->fromNumericCode(999);
        $currency->getNumericCode()->shouldReturn(999);

        $cache->get(Argument::any())->shouldHaveBeenCalledOnce();
    }

    public function it_throws_UnknownNumericCodeCurrencyException_during_fromNumericCode(ISO4217 $ISO4217) {
        $ISO4217->getData(999)->shouldBeCalled()->willThrow(new UnknownNumericCodeCurrencyException("999"));
        $this->shouldThrow(UnknownNumericCodeCurrencyException::class)->duringFromNumericCode(999);
    }

    public function it_creates_currency_from_alpha_code(ISO4217 $ISO4217) {
        $ISO4217->toNumericCode("XYZ")->shouldBeCalled()->willReturn(777);
        $ISO4217->getData(777)->shouldBeCalled()->willReturn([
            ISO4217::KEY_DESCRIPTION    => "description",
            ISO4217::KEY_ALPHA_CODE     => "XYZ",
            ISO4217::KEY_MINOR_UNITS    => 7,
            ISO4217::KEY_SYMBOL         => "W",
        ]);

        $currency = $this->fromAlphaCode("XYZ");
        $currency->getNumericCode()->shouldReturn(777);
    }

    public function it_throws_UnknownAlphaCodeCurrencyException_during_fromAlphaCode(ISO4217 $ISO4217) {
        $ISO4217->toNumericCode("XYZ")->shouldBeCalled()->willThrow(new UnknownAlphaCodeCurrencyException("XYZ"));
        $ISO4217->getData(999)->shouldNotBeCalled();
        $this->shouldThrow(UnknownAlphaCodeCurrencyException::class)->duringFromAlphaCode("XYZ");
    }
}
