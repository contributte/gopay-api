<?php

namespace Markette\Gopay\Api;

class PaymentMethodElement
{

	/** @var string */
	public $code = NULL;

	/** @var string */
	public $paymentMethodName = NULL;

	/** @var string */
	public $description = NULL;

	/** @var string */
	public $logo = NULL;

	/** @var string */
	public $offline = NULL;

	/**
	 * @codingStandardsIgnoreStart
	 * @param string $code
	 * @param string $paymentMethodName
	 * @param string $description
	 * @param string $logo
	 * @param string $offline
	 * @return void
	 */
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
