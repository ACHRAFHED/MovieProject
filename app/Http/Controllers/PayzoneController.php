<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayXpert\Connect2Pay\Connect2PayClient;
use PayXpert\Connect2Pay\containers\request\PaymentPrepareRequest;
use PayXpert\Connect2Pay\containers\Order;
use PayXpert\Connect2Pay\containers\Shipping;
use PayXpert\Connect2Pay\containers\Shopper;
use PayXpert\Connect2Pay\containers\Account;
use PayXpert\Connect2Pay\containers\constant\OrderShippingType;
use PayXpert\Connect2Pay\containers\constant\OrderType;
use PayXpert\Connect2Pay\containers\constant\PaymentMethod;
use PayXpert\Connect2Pay\containers\constant\PaymentMode;
use PayXpert\Connect2Pay\containers\constant\AccountAge;
use PayXpert\Connect2Pay\containers\constant\AccountLastChange;
use PayXpert\Connect2Pay\containers\constant\AccountPaymentMeanAge;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;


class PayzoneController extends Controller
{
 
    public function payment($total){
        
        $connect2pay = "https://paiement.payzone.ma";
        // This will be provided once your account is approved
        $originator  = "107123";
        $password    = "6h8a@CzbVRzKex7x";
    
        $c2pClient = new Connect2PayClient($connect2pay, $originator, $password);
    
        $prepareRequest = new PaymentPrepareRequest();
        $shopper = new Shopper();
        $account = new Account();
        $order = new Order();
        $shipping = new Shipping();
    
        // Set all information for the payment
        $prepareRequest->setPaymentMethod(PaymentMethod::CREDIT_CARD);
        $prepareRequest->setPaymentMode(PaymentMode::SINGLE);
        // To charge €25.99
        $prepareRequest->setCurrency("MAD");
        $prepareRequest->setAmount($total*100);
        // Extra custom data that are returned with the payment status
        $prepareRequest->setCtrlCustomData("Give that back to me please!!");
        
        // Where the customer will be redirected after the payment
        $prepareRequest->setCtrlRedirectURL("http://127.0.0.1:8000/return_page");
        // URL on the merchant site that will receive the callback notification
        $prepareRequest->setCtrlCallbackURL("https://merchant.example.com/payment/callback");
    
        $order->setId("12121");
        $order->setShippingType(OrderShippingType::DIGITAL_GOODS);
        $order->setType(OrderType::GOODS_SERVICE);
    
        $shopper->setId("1234567WX");
        $shopper->setFirstName("")->setLastName("");
        $shopper->setAddress1("Debit Street, 45");
        $shopper->setZipcode("3456TRG")->setCity("New York")->setState("NY")->setCountryCode("US");
        $shopper->setHomePhonePrefix("212")->setHomePhone("12345678");
        $shopper->setEmail("shopper@example.com");
    
        $account->setAge(AccountAge::LESS_30_DAYS);
        $account->setDate("20210106");
        $account->setLastChange(AccountLastChange::LESS_30_DAYS);
        $account->setLastChangeDate("20210106");
        $account->setPaymentMeanAge(AccountPaymentMeanAge::LESS_30_DAYS);
        $account->setPaymentMeanDate("20210106");
        // Set 'true' to trigger SCA challenge
        $account->setSuspicious(false);
    
        $shipping->setName("Aymane Heddad");
        $shipping->setAddress1("californie");
        $shipping->setZipcode("20400")->setState("CA")->setCity("Casablanca")->setCountryCode("MRC");
        $shipping->setPhone("+47123456789");
    
        $shopper->setAccount($account);
        $prepareRequest->setShopper($shopper);
        $prepareRequest->setOrder($order);
        $prepareRequest->setShipping($shipping);
    
        $result = $c2pClient->preparePayment($prepareRequest);
        if ($result !== false) {
            // The customer token info returned by the payment page could be saved in session (may
            // be used later when the customer will be redirected from the payment page)
            //$_SESSION['merchantToken'] = $result->getMerchantToken();
            session(['merchantToken' =>  $result->getMerchantToken()]);
          
            // The merchantToken must also be used later to validate the callback to avoid that anyone
            // could call it and abusively validate the payment. It may be stored in local database for this.
            
            // Now redirect the customer to the payment page
            return redirect()->away($c2pClient->getCustomerRedirectURL());
        } else {
            echo "Payment preparation error occurred: " . $c2pClient->getClientErrorMessage() . "\n";
        }
}

    public function return_page(){
   
        // We restore from the session the token info
      
// We restore from the session the token info
    $merchantToken = session('merchantToken');

        if ($merchantToken != null) {
            // Extract data received from the payment page
            $data = $_POST["data"];
      
            if ($data != null) {
                $connect2pay = "https://paiement.payzone.ma";
        // This will be provided once your account is approved
            $originator  = "107123";
            $password    = "6h8a@CzbVRzKex7x";
            // Setup the client and decrypt the redirect Status
                $c2pClient = new Connect2PayClient($connect2pay, $originator, $password);
                
            if ($c2pClient->handleRedirectStatus($data, $merchantToken)) {
                // Get the PaymentStatus object
                $status = $c2pClient->getStatus();
    
                $errorCode = $status->getErrorCode();
                $merchantData = $status->getCtrlCustomData();
            
              
                if ($errorCode == '000') {
   
                        session()->forget('cart');
                   
                         return view('thanks_page');                   
                }              
                   else {
                    return view('error_page');
                }
           
            }    
            }   
        }   
       
}
    public function thanks_page(){
        return view('thanks_page');
    }
    public function error_page(){
        return view('error_page');
    }

}
