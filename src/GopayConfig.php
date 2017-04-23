<?php

namespace Markette\Gopay\Api;

class GopayConfig
{

	/**
	 *  Konfiguracni trida pro ziskavani URL pro praci s platbami
	 */
	const TEST = "TEST";
	const PROD = "PROD";

    /**
     * Testovaci a produkcni URL
     */
    const TEST_URL = 'https://gw.sandbox.gopay.com/';
    const PROD_URL = 'https://gate.gopay.cz/';

	/**
	 * Parametr specifikujici, pracuje-li se na testovacim ci provoznim prostredi
	 */
	public static $version = self::TEST;

	/**
	 * @var callable
	 */
	public static $soapClientFactory = '\Markette\Gopay\Api\SoapClientFactory::create';

	/**
	 * Nastaveni testovaciho ci provozniho prostredi prostrednictvim parametru
	 *
	 * @param $new_version
	 * TEST - Testovaci prostredi
	 * PROD - Provozni prostredi
	 *
	 * @param string $new_version typ verze
	 * @return void
	 */
	public static function init($new_version)
	{
		self::$version = $new_version;
	}


	/**
	 * URL platebni brany pro uplnou integraci
	 *
	 * @return string URL
	 */
	public static function fullIntegrationURL()
	{
		if (self::$version == self::PROD) {
			return self::PROD_URL . 'gw/pay-full-v2';

		} else {
			return self::TEST_URL . 'gw/pay-full-v2';

		}
	}


	/**
	 * URL webove sluzby GoPay
	 *
	 * @return string URL - wsdl
	 */
	public static function ws()
	{
		if (self::$version == self::PROD) {
			return self::PROD_URL . 'axis/EPaymentServiceV2?wsdl';

		} else {
			return self::TEST_URL . 'axis/EPaymentServiceV2?wsdl';

		}
	}

	/**
	 * Nové URL webove sluzby GoPay
	 *
	 * @return string URL - wsdl
	 */
	public static function fullNewIntegrationURL()
	{
		if (self::$version == self::PROD) {
			return self::PROD_URL . 'gw/v3';

		} else {
			return self::TEST_URL . 'gw/v3';

		}
	}


	/**
	 * URL platebni brany pro zakladni integraci
	 *
	 * @return string URL
	 */
	public static function baseIntegrationURL()
	{
		if (self::$version == self::PROD) {
			return self::PROD_URL . 'gw/pay-base-v2';

		} else {
			return self::TEST_URL . 'gw/pay-base-v2';

		}
	}


	/**
	 * URL pro stazeni vypisu plateb uzivatele
	 *
	 * @return string URL
	 */
	public static function getAccountStatementURL()
	{
		if (self::$version == self::PROD) {
			return self::PROD_URL . 'gw/services/get-account-statement';

		} else {
			return self::TEST_URL . 'gw/services/get-account-statement';

		}
	}


	/**
	 * @return \SoapClient
	 */
	public static function createSoapClient()
	{
		$soap = call_user_func(self::$soapClientFactory, self::ws());
		if ($soap instanceof \SoapClient) {
			return $soap;
		}

		throw new \UnexpectedValueException('SoapClient factory does not return instance of SoapClient.');
	}

}
