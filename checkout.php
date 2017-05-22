<?php
require __DIR__ . '/config.php';
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;


$payer = new Payer();
$payer->setPaymentMethod("paypal");

//p1
$item1 = new Item();
$item1->setName('Muska kosulja')
    ->setCurrency('EUR')
    ->setQuantity(3)
    ->setPrice(10);
//p2	
$item2 = new Item();
$item2->setName('Muska jakna')
    ->setCurrency('EUR')
    ->setQuantity(1)
    ->setPrice(500);

//spisak proizvoda na paypal sajtu
$itemList = new ItemList();
$itemList->setItems(array($item1, $item2));

//subtotal je sum_i(kol_i*cena_i)
$details = new Details();
$details->setSubtotal(530)
		->setShipping(5)
		->setTax(10);

//ukupno je subtotal +shipping + tax
$amount = new Amount();
$amount->setCurrency("EUR")
	   ->setTotal(545)
	   ->setDetails($details);

$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription("Kupovina na sajtu onlineProdaja.com")
    ->setInvoiceNumber(uniqid());


$baseUrl =  "http://localhost:81/paypaltest/sample";

//success i fail linkovi
$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl("$baseUrl/success.php?success=true")
			 ->setCancelUrl("$baseUrl/success.php?success=false");

$payment = new Payment();
$payment->setIntent("sale")
    ->setPayer($payer)
    ->setRedirectUrls($redirectUrls)
    ->setTransactions(array($transaction));

//$request = clone $payment;

try {

    $payment->create($apiContext);
	
} 
catch (Exception $ex) {
    
	echo $ex;
    exit(1);
}

foreach ($payment->getLinks() as $link) {
    if ($link->getRel() == 'approval_url') {
        $approvalUrl = $link->getHref();
        break;
    }
}
echo 'Checkout sa PayPal-om<br/>';
echo "<a href='$approvalUrl'><img alt='co' src='../images/paypal.gif' /></a>";

return $payment;
?>