<?php

/**
 * Test: OpenSSL
 */

use Tester\Assert;

require __DIR__ . '/../../bootstrap.php';

if (!extension_loaded('openssl')) {
	Tester\Environment::skip('Test requires mcrypt extension to be loaded.');
}

test(function () {
	$crypt = new \Markette\Gopay\Crypt\OpenSSL();

	$encrypted = $crypt->encrypt('Secret Data', 'Secure Key');
	Assert::same('86ef6efb10c2eca867507237c0df3094', $encrypted);

	$decrypted = $crypt->decrypt($encrypted, 'Secure Key');
	Assert::same('Secret Data', $decrypted);
});
