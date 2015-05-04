<?php

/**
 * Test: PaymentMethodElement
 */

use Markette\Gopay\Api\PaymentMethodElement;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

test(function () {
	$code = "c1";
	$paymentMethodName = "p2";
	$description = "d3";
	$logo = "l4";
	$offline = "o5";

	$pme = new PaymentMethodElement();
	$pme->PaymentMethodElement(
		$code,
		$paymentMethodName,
		$description,
		$logo,
		$offline
	);

	Assert::same($code, $pme->code);
	Assert::same($paymentMethodName, $pme->paymentMethodName);
	Assert::same($description, $pme->description);
	Assert::same($logo, $pme->logo);
	Assert::same($offline, $pme->offline);
});
