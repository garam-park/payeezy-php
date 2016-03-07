<?php namespace Parkgaram\Payeezy\Payload;

class CreditCardAuthorizeBuilder {

  private $merchant_ref;
  private $amount;
  private $currency_code;
  private $type;
  private $cardholder_name;
  private $card_number;
  private $exp_date;
  private $cvv;

  public function __construct($merchant_ref='') {
       $this->merchant_ref = $merchant_ref;
  }

  static public function init($merchant_ref='')
  {
    return new CreditCardAuthorizeBuilder($merchant_ref);
  }

  public function setMerchantRef($value='')
  {
    $this->merchant_ref = $value;
    return $this;
  }

  public function getMerchantRef()
  {
    return $this->merchant_ref;
  }


  public function setAmount($value='')
  {
    $this->amount = $value;
    return $this;
  }

  public function getAmount()
  {
    return $this->amount;
  }

  public function setCurrencyCode($value='')
  {
    $this->currency_code = $value;
    return $this;
  }

  public function getCurrentCode()
  {
    return $this->currency_code;
  }

  public function setType($value='')
  {
    $this->cardholder_name = $value;
    return $this;
  }

  public function setCardHolderName($value='')
  {
    $this->cardholder_name = $value;
    return $this;
  }

  public function setCardNumber($value='')
  {
    $this->card_number = $value;
    return $this;
  }

  public function setExpDate($value='')
  {
    $this->exp_date = $value;
    return $this;
  }

  public function setCvv($value='')
  {
    $this->cvv = $value;
    return $this;
  }
}
