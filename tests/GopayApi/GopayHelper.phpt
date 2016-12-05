<?php

/**
 * Test: GopayHelper
 */

use Markette\Gopay\Api\GopayHelper;
use Tester\Assert;

require __DIR__ . '/../bootstrap.php';

test(function () {
	$encrypted = GopayHelper::encrypt('Secret Data', 'Secure Key');
	Assert::same('86ef6efb10c2eca867507237c0df3094', $encrypted);

	$decrypted = GopayHelper::decrypt($encrypted, 'Secure Key');
	Assert::same('Secret Data', $decrypted);
});
