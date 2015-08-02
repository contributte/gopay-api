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
	Assert::equal('https://gate.gopay.cz/gw/v3', GopayConfig::fullNewIntegrationURL());

	GopayConfig::init(GopayConfig::TEST);
	Assert::equal(GopayConfig::TEST, GopayConfig::$version);
	Assert::equal('https://testgw.gopay.cz/gw/v3', GopayConfig::fullNewIntegrationURL());
});

test(function () {
	GopayConfig::$soapClientFactory = function ($wsdl) {
		Assert::same(GopayConfig::ws(), $wsdl);
		return Mockery::mock('\SoapClient');
	};

	Assert::true(GopayConfig::createSoapClient() instanceof \SoapClient);
});
