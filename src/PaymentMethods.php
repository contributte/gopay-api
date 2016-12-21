<?php

namespace Markette\Gopay\Api;

/**
 * Definice platebnich metod - stazeno pomoci WS ze serveru GoPay
 */
class PaymentMethods
{

	/** @var array */
	public $paymentMethods = [];

	/**
	 * @param array $paymentMethodsWS
	 * @return void
	 */
	public function adapt($paymentMethodsWS)
	{
		$this->paymentMethods = $paymentMethodsWS;
	}

}
