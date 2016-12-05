<?php

/**
 * Copyright © 2016 Jaroslav Hranička <hranicka@outlook.com>
 */

namespace Markette\Gopay\Crypt;

interface Crypt
{

	public function encrypt($data, $secureKey);

	public function decrypt($data, $secureKey);

}
