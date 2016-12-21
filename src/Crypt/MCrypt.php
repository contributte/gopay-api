<?php

/**
 * Copyright © 2016 Jaroslav Hranička <hranicka@outlook.com>
 */

namespace Markette\Gopay\Crypt;

use Markette\Gopay\Api\GopayHelper;

/**
 * GoPay original crypto functions for API v2.5.
 * Requires mcrypt extension.
 */
class MCrypt implements Crypt
{

	final public function encrypt($data, $secureKey)
	{
		$td = @mcrypt_module_open(MCRYPT_3DES, '', MCRYPT_MODE_ECB, '');
		$mcrypt_iv = @mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
		@mcrypt_generic_init($td, substr($secureKey, 0, mcrypt_enc_get_key_size($td)), $mcrypt_iv);
		$encrypted_data = @mcrypt_generic($td, $data);
		@mcrypt_generic_deinit($td);
		@mcrypt_module_close($td);

		return bin2hex($encrypted_data);
	}

	final public function decrypt($data, $secureKey)
	{
		$td = @mcrypt_module_open(MCRYPT_3DES, '', MCRYPT_MODE_ECB, '');
		$mcrypt_iv = @mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
		@mcrypt_generic_init($td, substr($secureKey, 0, mcrypt_enc_get_key_size($td)), $mcrypt_iv);

		$decrypted_data = @mdecrypt_generic($td, GopayHelper::convert($data));
		@mcrypt_generic_deinit($td);
		@mcrypt_module_close($td);

		return trim($decrypted_data);
	}

}
