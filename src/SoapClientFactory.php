<?php

namespace Markette\Gopay\Api;

class SoapClientFactory
{

	/**
	 * @param string $wsdl
	 * @return \SoapClient
	 */
	public static function create($wsdl)
	{
		return new \SoapClient($wsdl, array());
	}
	
}
