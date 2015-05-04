<?php

namespace Markette\Gopay\Api;

/**
 * Definice platebnich metod - stazeno pomoci WS ze serveru GoPay
 */
class PaymentMethods
{
	public $paymentMethods = array();

	public function adapt($paymentMethodsWS)
	{
		$this->paymentMethods = $paymentMethodsWS;
	}
}
