<?php

/**
 * Test: OpenSSL
 */

use Markette\Gopay\Crypt\OpenSSL;
use Tester\Assert;
use Tester\Environment;

require __DIR__ . '/../../bootstrap.php';

if (!extension_loaded('openssl') || PHP_VERSION_ID <= 50400) {
	Environment::skip('Test requires openssl extension to be loaded and PHP >= 5.4.');
}

test(function () {
	$crypt = new OpenSSL();

	$encrypted = $crypt->encrypt('Secret Data', 'Secure Key');
	Assert::same('86ef6efb10c2eca867507237c0df3094', $encrypted);

	$decrypted = $crypt->decrypt($encrypted, 'Secure Key');
	Assert::same('Secret Data', $decrypted);
});
