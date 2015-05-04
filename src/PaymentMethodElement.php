<?php

namespace Markette\Gopay\Api;

class PaymentMethodElement
{

	public $code = NULL;
	public $paymentMethodName = NULL;
	public $description = NULL;
	public $logo = NULL;
	public $offline = NULL;

	public function PaymentMethodElement(
		$code,
		$paymentMethodName,
		$description,
		$logo,
		$offline
	)
	{
		$this->code = $code;
		$this->paymentMethodName = $paymentMethodName;
		$this->description = $description;
		$this->logo = $logo;
		$this->offline = $offline;
	}

}
