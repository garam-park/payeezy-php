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
  private $transaction_type;
  private $method;

  public function __construct($merchant_ref='') {
       $this->merchant_ref = $merchant_ref;
       $this->method = "credit_card";
       $this->transaction_type = "authorize";
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

  public function build()
  {
    $payload = array(
        'merchant_ref' => self::trim($this->merchant_ref),
        'method' => self::trim($this->method),
        'transaction_type' => self::trim($this->transaction_type),
        'amount' => self::trim($this->amount),
        'currency_code' => self::trim($this->currency_code),
        'credit_card' => array(
            'type' => self::trim($this->type),
            'cvv' => self::trim($this->cvv),
            'cardholder_name' => self::trim($this->cardholder_name),
            'card_number' => self::trim($this->card_number),
            'exp_date' => self::trim($this->exp_date),
        ),
    );
    return json_encode($payload, JSON_FORCE_OBJECT);
  }

  private static function trim($data) {
      return htmlspecialchars(stripslashes(trim($data)));
  }
}
