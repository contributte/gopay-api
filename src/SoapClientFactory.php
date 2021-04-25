<?php declare(strict_types = 1);

namespace Markette\Gopay\Api;

use SoapClient;

class SoapClientFactory
{

	/**
	 * @param string $wsdl
	 * @return SoapClient
	 */
	public static function create($wsdl)
	{
		return new SoapClient($wsdl, []);
	}

}
