<?php

/**
 * Test: GopayConfig
 */

use Markette\Gopay\Api\GopayConfig;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

test(function () {
	GopayConfig::init(GopayConfig::PROD);
	Assert::equal(GopayConfig::PROD, GopayConfig::$version);

	GopayConfig::init(GopayConfig::TEST);
	Assert::equal(GopayConfig::TEST, GopayConfig::$version);
});

test(function () {
	GopayConfig::$soapClientFactory = function ($wsdl) {
		Assert::same(GopayConfig::ws(), $wsdl);
		return Mockery::mock('\SoapClient');
	};

	Assert::true(GopayConfig::createSoapClient() instanceof \SoapClient);
});
