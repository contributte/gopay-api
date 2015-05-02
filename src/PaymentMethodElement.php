<?php

namespace Markette\GopayApi;

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