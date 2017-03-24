<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paypal;
use Redirect;

class Checkout extends Controller
{
    private $_apiContext;
    public function __construct()
    {
        $this->_apiContext = PayPal::ApiContext(
            config('services.paypal.client_id'),
            config('services.paypal.secret'));
        $this->_apiContext->setConfig(array(
            'mode' => 'sandbox',
            'service.EndPoint' => 'https://api.sandbox.paypal.com',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path('logs/paypal.log'),
            'log.LogLevel' => 'FINE'
        ));
    }
    public function checkout()
    {
        {
    	$payer = PayPal::Payer();
	    $payer->setPaymentMethod('paypal');
	    $amount = PayPal:: Amount();
	    $amount->setCurrency('EUR');
	    $amount->setTotal(42); // This is the simple way,
	    // you can alternatively describe everything in the order separately;
	    // Reference the PayPal PHP REST SDK for details.
	    $transaction = PayPal::Transaction();
	    $transaction->setAmount($amount);
	    $transaction->setDescription('What are you selling?');
	    $redirectUrls = PayPal:: RedirectUrls();
	    $redirectUrls->setReturnUrl(url('done'));
	    $redirectUrls->setCancelUrl(url('cancel'));
	    $payment = PayPal::Payment();
	    $payment->setIntent('sale');
	    $payment->setPayer($payer);
	    $payment->setRedirectUrls($redirectUrls);
	    $payment->setTransactions(array($transaction));
	    $response = $payment->create($this->_apiContext);
	    $redirectUrl = $response->links[1]->href;
	    return Redirect::to( $redirectUrl );
    }
    }
    public function all()
    {
    	$all = Paypal::getAll(array('count' => 10, 'start_index' => 0), $this->_apiContext);
    	return $all;
    }
}
