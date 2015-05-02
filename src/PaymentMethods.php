<?php

namespace Markette\GopayApi;

/**
 * Definice platebnich metod - stazeno pomoci WS ze serveru GoPay
 * 
 */
class PaymentMethods {
	
	var $paymentMethods = array();

	public function adapt($paymentMethodsWS) {

		$this->paymentMethods = $paymentMethodsWS;
	}

}
?>