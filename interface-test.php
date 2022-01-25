<?php


interface PaymentInterface {

    public function paymentStep();

}



class Paypal implements PaymentInterface {

    public function paymentStep() {
        self::loggingIn();
        self::payNow();
    }

    public static function payNow() {echo "paynow executed from paypal";}
    public static function loggingIn() {
        echo "logging in...";
    }
}

class Visa implements PaymentInterface {

    public function paymentStep() {
        self::payNow();
    }

    public static function payNow() {echo "paynow executed from visa";}
}

class Cash implements PaymentInterface {

    public function paymentStep() {
        self::payNow();
    }

    public static function payNow() {echo "paynow executed from cash";}
}

class BuyProduct {
    public function pay(PaymentInterface $paymentType){
        $paymentType->paymentStep();
    }
}

$paymentType = new Visa;

$buyProduct = new BuyProduct;

$buyProduct->pay($paymentType);

