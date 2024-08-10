<?php

interface PaymentGetway{
    function sendPayment($payment); // no body in this function 
}
class PaymentProcessor{
    private $gateway=null;
    function __construct(PaymentGetway $Pg)
    {
        $this->gateway=$Pg;
    }
    function purchaseProduct($amount=0){
        $this->gateway->sendPayment($amount);
    }
}
class Paypal implements PaymentGetway{
    function sendPayment($payment){
        echo "{$payment} sent to paypal<br>";
    }
}
class Stripe {
    function MakePayment($amount,$currency=NULL)
    {
        echo "{$amount} send to stripe Currency: {$currency}<br>"; 
    }
}
class StripeAdapter implements PaymentGetway{
    private $stripe=null;
   function __construct(Stripe $stripe)
   {
        $this->stripe=$stripe; 
   }
   function sendPayment($amount){
       $this->stripe->MakePayment($amount,"USD");
   }
}

$sa=new StripeAdapter(new Stripe()); 
$paymentProcessor=new PaymentProcessor($sa);
$paymentProcessor->purchaseProduct(1000);

echo "<br>"; 
$paypal=new Paypal; 
$paymentProcessor=new PaymentProcessor($paypal);
$paymentProcessor->purchaseProduct(43000);


?>