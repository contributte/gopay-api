<?php declare(strict_types = 1);

namespace Markette\Gopay\Api;

class PaymentMethodElement
{

	/** @var string */
	public $code = null;

	/** @var string */
	public $paymentMethodName = null;

	/** @var string */
	public $description = null;

	/** @var string */
	public $logo = null;

	/** @var string */
	public $offline = null;

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
