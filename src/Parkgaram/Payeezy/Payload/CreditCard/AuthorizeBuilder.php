<?php namespace Parkgaram\Payeezy\Payload\CreditCard;

class AuthorizeBuilder extends Builder{

  protected function __construct($merchant_ref='')
  {
    parent::__construct($merchant_ref);
    $this->transaction_type = "authorize";
  }

  static public function init($merchant_ref='')
  {
    return new AuthorizeBuilder($merchant_ref);
  }

  public function build()
  {
    $payload = array(
        'merchant_ref' => parent::trim($this->merchant_ref),
        'method' => parent::trim($this->method),
        'transaction_type' => parent::trim($this->transaction_type),
        'amount' => parent::trim($this->amount),
        'currency_code' => parent::trim($this->currency_code),
        'credit_card' => array(
            'type' => parent::trim($this->type),
            'cvv' => parent::trim($this->cvv),
            'cardholder_name' => parent::trim($this->cardholder_name),
            'card_number' => parent::trim($this->card_number),
            'exp_date' => parent::trim($this->exp_date),
        ),
    );
    return json_encode($payload, JSON_FORCE_OBJECT);
  }
}
