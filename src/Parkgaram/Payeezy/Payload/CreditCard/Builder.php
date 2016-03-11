<?php namespace Parkgaram\Payeezy\Payload\CreditCard;

abstract class Builder {

  /** 
   * API Imfomations
   */
  protected $merchant_ref;
  protected $amount;
  protected $currency_code;
  protected $transaction_type;
  protected $method;
  
  /**
   * Card Infomations
   */
  protected $type;
  protected $cardholder_name;
  protected $card_number;
  protected $exp_date;
  protected $cvv;
  

  protected function __construct($merchant_ref='') {
    $this->method = "credit_card";
    $this->merchant_ref = $merchant_ref;
  }

  abstract static public function init($merchant_ref='');

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

  public function getCurrencyCode()
  {
    return $this->currency_code;
  }

  public function setType($value='')
  {
    $this->type = $value;
    return $this;
  }

  public function getType()
  {
    return $this->type;
  }

  public function setCardHolderName($value='')
  {
    $this->cardholder_name = $value;
    return $this;
  }

  public function getCardHolderName()
  {
    return $this->cardholder_name;
  }

  public function setCardNumber($value='')
  {
    $this->card_number = $value;
    return $this;
  }

  public function getCardNumber()
  {
    return $this->card_number;
  }

  public function setExpDate($value='')
  {
    $this->exp_date = $value;
    return $this;
  }

  public function getExpDate()
  {
    return $this->exp_date;
  }

  public function setCvv($value='')
  {
    $this->cvv = $value;
    return $this;
  }

  public function getCvv()
  {
    return $this->cvv;
  }

  abstract public function build();

  protected function trim($data) {
      return htmlspecialchars(stripslashes(trim($data)));
  }
}
