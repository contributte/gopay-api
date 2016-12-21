<?php

/**
 * Test: MCrypt
 */

use Markette\Gopay\Crypt\MCrypt;
use Tester\Assert;
use Tester\Environment;

require __DIR__ . '/../../bootstrap.php';

if (!extension_loaded('mcrypt')) {
	Environment::skip('Test requires mcrypt extension to be loaded.');
}

if (PHP_VERSION_ID > 70200) {
	Environment::skip('Mcrypt extension is dropped in PHP 7.2.');
}

test(function () {
	$crypt = new MCrypt();

	$encrypted = $crypt->encrypt('Secret Data', 'Secure Key');
	Assert::same('86ef6efb10c2eca867507237c0df3094', $encrypted);

	$decrypted = $crypt->decrypt($encrypted, 'Secure Key');
	Assert::same('Secret Data', $decrypted);
});
