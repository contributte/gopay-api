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

class PaymentMethodElement {
	var $code = null;
	var $paymentMethodName = null;
	var $description = null;
	var $logo = null;
	var $offline = null;
	
	function PaymentMethodElement($code,
			$paymentMethodName,
			$description,
			$logo,
			$offline) {

		$this->code = $code;
		$this->paymentMethodName = $paymentMethodName;
		$this->description = $description;
		$this->logo = $logo;
		$this->offline = $offline;
	}
	
}
?>