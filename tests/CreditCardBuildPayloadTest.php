<?php require __DIR__.'/../vendor/autoload.php';

use Parkgaram\Payeezy\Payload\CreditCard\AuthorizeBuilder;
use Parkgaram\Payeezy\Payload\CreditCard\PurchaseBuilder;

class BuildPayloadTest extends PHPUnit_Framework_TestCase
{

  public function testCreditCardAuthorizeBuilderInit()
  {
    $merchant_ref = "test merchant_ref";
    $authorizeBuilder = AuthorizeBuilder::init($merchant_ref);
    $this->assertEquals($merchant_ref, $authorizeBuilder->getMerchantRef());
  }

  public function testCreditCardAuthorizeBuilderAmount()
  {
    $amount = 1999;
    $authorizeBuilder =
    AuthorizeBuilder::init()->setAmount($amount);
    $this->assertEquals($amount, $authorizeBuilder->getAmount());
  }

  public function testCreditCardAuthorizeBuilderCurrencyCode($value='')
  {
    $currency_code = "USD";
    $authorizeBuilder =
    AuthorizeBuilder::init()->setCurrencyCode($currency_code);
    $this->assertEquals($currency_code, $authorizeBuilder->getCurrencyCode());
  }

  public function testCreditCardAuthorizeBuilderType($value='')
  {
    $type = "visa";
    $authorizeBuilder =
    AuthorizeBuilder::init()->setType($type);
    $this->assertEquals($type, $authorizeBuilder->getType());
  }

  public function testCreditCardAuthorizeBuilderCardHolderName($value='')
  {
    $cardholder_name = "john smith";
    $authorizeBuilder =
    AuthorizeBuilder::init()->setCardHolderName($cardholder_name);
    $this->assertEquals($cardholder_name, $authorizeBuilder->getCardHolderName());
  }

  public function testCreditCardAuthorizeBuilderCardNumber($value='')
  {
    $card_number = "12312312412412";
    $authorizeBuilder =
    AuthorizeBuilder::init()->setCardNumber($card_number);
    $this->assertEquals($card_number, $authorizeBuilder->getCardNumber());
  }

  public function testCreditCardAuthorizeBuilderExpDate($value='')
  {
    $exp_date = "0319";
    $authorizeBuilder =
    AuthorizeBuilder::init()->setExpDate($exp_date);
    $this->assertEquals($exp_date, $authorizeBuilder->getExpDate());
  }

  public function testCreditCardAuthorizeBuilderCvv($value='')
  {
    $cvv = "333";
    $authorizeBuilder =
    AuthorizeBuilder::init()->setCvv($cvv);
    $this->assertEquals($cvv, $authorizeBuilder->getCvv());
  }

  public function testCreditCardAuthorizeBuilderBuild($value='')
  {
    $merchant_ref = "Astonishing-Sale";
    $amount = "1299";
    $currency_code = "USD";
    $type = "visa";
    $cardholder_name = "garam park";
    $card_number = "4788250000028291";
    $exp_date = "1020";
    $cvv = "123";

    $authorizeBuilder = AuthorizeBuilder::init($merchant_ref)
    ->setAmount($amount)
    ->setCurrencyCode($currency_code)
    ->setType($type)
    ->setCardHolderName($cardholder_name)
    ->setCardNumber($card_number)
    ->setExpDate($exp_date)
    ->setCvv($cvv);
    
    $payload = $authorizeBuilder->build();

    // print_r($payload);

    $this->assertEquals($merchant_ref,$authorizeBuilder->getMerchantRef() );
    $this->assertEquals($amount,$authorizeBuilder->getAmount());
    $this->assertEquals($currency_code,$authorizeBuilder->getCurrencyCode());
    $this->assertEquals($type,$authorizeBuilder->getType() );
    $this->assertEquals($cardholder_name,$authorizeBuilder->getCardHolderName());
    $this->assertEquals($card_number,$authorizeBuilder->getCardNumber());
    $this->assertEquals($exp_date,$authorizeBuilder->getExpDate() );
    $this->assertEquals($cvv,$authorizeBuilder->getCvv());

  }

//

  public function testCreditCardPurchaseBuilderInit()
  {
    $merchant_ref = "test merchant_ref";
    $purchacseBuilder = PurchaseBuilder::init($merchant_ref);
    $this->assertEquals($merchant_ref, $purchacseBuilder->getMerchantRef());
  }

  public function testCreditCardPurchaseBuilderAmount()
  {
    $amount = 1999;
    $purchacseBuilder =
    PurchaseBuilder::init()->setAmount($amount);
    $this->assertEquals($amount, $purchacseBuilder->getAmount());
  }

  public function testCreditCardPurchaseBuilderCurrencyCode($value='')
  {
    $currency_code = "USD";
    $purchacseBuilder =
    PurchaseBuilder::init()->setCurrencyCode($currency_code);
    $this->assertEquals($currency_code, $purchacseBuilder->getCurrencyCode());
  }

  public function testCreditCardPurchaseBuilderType($value='')
  {
    $type = "visa";
    $purchacseBuilder =
    PurchaseBuilder::init()->setType($type);
    $this->assertEquals($type, $purchacseBuilder->getType());
  }

  public function testCreditCardPurchaseBuilderCardHolderName($value='')
  {
    $cardholder_name = "john smith";
    $purchacseBuilder =
    PurchaseBuilder::init()->setCardHolderName($cardholder_name);
    $this->assertEquals($cardholder_name, $purchacseBuilder->getCardHolderName());
  }

  public function testCreditCardPurchaseBuilderCardNumber($value='')
  {
    $card_number = "12312312412412";
    $purchacseBuilder =
    PurchaseBuilder::init()->setCardNumber($card_number);
    $this->assertEquals($card_number, $purchacseBuilder->getCardNumber());
  }

  public function testCreditCardPurchaseBuilderExpDate($value='')
  {
    $exp_date = "0319";
    $purchacseBuilder =
    PurchaseBuilder::init()->setExpDate($exp_date);
    $this->assertEquals($exp_date, $purchacseBuilder->getExpDate());
  }

  public function testCreditCardPurchaseBuilderCvv($value='')
  {
    $cvv = "333";
    $purchacseBuilder =
    PurchaseBuilder::init()->setCvv($cvv);
    $this->assertEquals($cvv, $purchacseBuilder->getCvv());
  }

  public function testCreditCardPurchaseBuilderBuild($value='')
  {
    $merchant_ref = "Astonishing-Sale";
    $amount = "1299";
    $partial_redemption = false;
    $currency_code = "USD";
    $type = "visa";
    $cardholder_name = "garam park";
    $card_number = "4788250000028291";
    $exp_date = "1020";
    $cvv = "123";

    $purchacseBuilder = PurchaseBuilder::init($merchant_ref)
    ->setAmount($amount)
    ->setCurrencyCode($currency_code)
    ->setType($type)
    ->setCardHolderName($cardholder_name)
    ->setCardNumber($card_number)
    ->setExpDate($exp_date)
    ->setPartialRedemption($partial_redemption)
    ->setCvv($cvv);
    
    $payload = $purchacseBuilder->build();

    $this->assertEquals($merchant_ref,$purchacseBuilder->getMerchantRef() );
    $this->assertEquals($amount,$purchacseBuilder->getAmount());
    $this->assertEquals($currency_code,$purchacseBuilder->getCurrencyCode());
    $this->assertEquals($type,$purchacseBuilder->getType() );
    $this->assertEquals($cardholder_name,$purchacseBuilder->getCardHolderName());
    $this->assertEquals($card_number,$purchacseBuilder->getCardNumber());
    $this->assertEquals($exp_date,$purchacseBuilder->getExpDate() );
    $this->assertEquals($cvv,$purchacseBuilder->getCvv());
    $this->assertEquals($partial_redemption,$purchacseBuilder->getPartialRedemption());

  }
}
