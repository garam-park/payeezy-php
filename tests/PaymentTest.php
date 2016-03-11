<?php require __DIR__.'/../vendor/autoload.php';

use Parkgaram\Payeezy\Payload\CreditCard\AuthorizeBuilder;
use Parkgaram\Payeezy\Payload\CreditCard\PurchaseBuilder;
use Parkgaram\Payeezy\Api;

class PaymentTest extends PHPUnit_Framework_TestCase
{

  public function testCreditCardAuthorize()
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
    
    $json = $authorizeBuilder->build();

    $api = new Api(
    	'',
    	'',
    	'',
    	Api::$URI_SANDBOX
    	);
    $response = json_decode($api->creditCardPayment($json),TRUE);

    $this->assertEquals($response['gateway_resp_code'], 00);
    $this->assertEquals($response['gateway_message'], 'Transaction Normal');
  }
}