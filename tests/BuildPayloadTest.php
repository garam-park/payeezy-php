<?php require __DIR__.'/../vendor/autoload.php';

use Parkgaram\Payeezy\Money;
use Parkgaram\Payeezy\Payload\CreditCardAuthorizeBuilder as AuthorizeBuilder;

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
    $this->assertEquals($currency_code, $authorizeBuilder->getCurrentCode());
  }

  public

}
