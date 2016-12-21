<?php

/**
 * Test: PaymentMethods
 */

use Markette\Gopay\Api\PaymentMethods;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

test(function () {
	$methods = ['a' => 1];
	$paymentMethods = new PaymentMethods();
	$paymentMethods->adapt($methods);

	Assert::same($methods, $paymentMethods->paymentMethods);
});
