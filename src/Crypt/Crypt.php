<?php declare(strict_types = 1);

/**
 * Copyright © 2016 Jaroslav Hranička <hranicka@outlook.com>
 */

namespace Markette\Gopay\Api\Crypt;

interface Crypt
{

	/**
	 * Encrypt 3DES to HEX.
	 *
	 * @param string $data
	 * @param string $secureKey
	 * @return string
	 */
	public function encrypt($data, $secureKey);

	/**
	 * Decrypt HEX 3DES to string.
	 *
	 * @param string $data
	 * @param string $secureKey
	 * @return string
	 */
	public function decrypt($data, $secureKey);

}
