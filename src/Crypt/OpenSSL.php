<?php declare(strict_types = 1);

/**
 * Copyright © 2016 Jaroslav Hranička <hranicka@outlook.com>
 */

namespace Markette\Gopay\Api\Crypt;

use Markette\Gopay\Api\GopayHelper;

/**
 * OpenSSL alternative for GoPay's original mcrypt immplementation in API v2.5.
 * Requires openssl installed.
 */
final class OpenSSL implements Crypt
{

	/**
	 * @param string $data
	 * @param string $secureKey
	 * @return string
	 */
	final public function encrypt($data, $secureKey)
	{
		// Strip a key
		$secureKey = substr($secureKey, 0, 24);

		// Fill bytes
		while (strlen($data) % 8 !== 0) {
			$data .= "\0";
		}

		// Crypt
		$ecrypted = openssl_encrypt($data, 'des-ede3', $secureKey, OPENSSL_RAW_DATA | OPENSSL_NO_PADDING);

		return bin2hex($ecrypted);
	}

	/**
	 * @param string $data
	 * @param string $secureKey
	 * @return string
	 */
	final public function decrypt($data, $secureKey)
	{
		// Strip a key
		$secureKey = substr($secureKey, 0, 24);

		// Convert HEX -> string
		$data = GopayHelper::convert($data);

		// Decrypt
		$decrypted = openssl_decrypt($data, 'des-ede3', $secureKey, OPENSSL_RAW_DATA | OPENSSL_NO_PADDING);

		return trim($decrypted);
	}

}
