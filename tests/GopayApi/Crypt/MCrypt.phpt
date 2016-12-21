<?php

/**
 * Test: MCrypt
 */

use Tester\Assert;

require __DIR__ . '/../../bootstrap.php';

if (!extension_loaded('mcrypt')) {
	Tester\Environment::skip('Test requires mcrypt extension to be loaded.');
}

test(function () {
	$crypt = new \Markette\Gopay\Crypt\MCrypt();

	$encrypted = $crypt->encrypt('Secret Data', 'Secure Key');
	Assert::same('86ef6efb10c2eca867507237c0df3094', $encrypted);

	$decrypted = $crypt->decrypt($encrypted, 'Secure Key');
	Assert::same('Secret Data', $decrypted);
});
