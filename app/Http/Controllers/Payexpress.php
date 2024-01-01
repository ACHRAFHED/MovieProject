<?php

namespace App\Http\Controllers;

use Payexpress\Connect2PayexpressPos;

use Illuminate\Http\Request;

class Payexpress extends Controller
{
    public function payment($total){
        //Instantiate a new Connect2PayexpressPos Object
        
        $captcha_webservice_url = 'https://payexpress.ma/gateway/ws/reset';
        
        $c2p = new Connect2PayexpressPos($captcha_webservice_url);
        
         
        
        /////////////////////////////////////////////////
        
        //////////// Identification Fields //////////////
        
        /////////////////////////////////////////////////
        
        $c2p->setAcquirerId("2019120903");
        
        $c2p->setPosId("4019120501");
        
        $c2p->setProviderCode("0001");
        
        $c2p->setSenderMacIndex("1");
        
        $c2p->setAcquirerPublicInputKey1("JKVWU1IGU9MGOVB0717YVGUOA929D1SL");
        
        $c2p->setAcquirerPublicInputKey2("22KULXPIV1G3QPOF7YL3T37N1565XHJ8");
        
         
        
         
        
        /////////////////////////////////////////////////
        
        ///////////////// Order Fields //////////////////
        
        /////////////////////////////////////////////////
        
        $c2p->setPosBookId('ID-155252');
        
        //$c2p->setPosBookDate($pos_book_date);
     
        $c2p->setTransactionAmount($total);
        
       
        
         
        
        /////////////////////////////////////////////////
        
        /////////////// Customer Fields /////////////////
        
        /////////////////////////////////////////////////
        
    $c2p->setCustomerId("2");
        
        // $c2p->setCustomerTitle("Film");
        
        
        
        $c2p->setCustomerName("Achraf Heddad");
        
        $c2p->setCustomerCityId("10");
        
        $c2p->setSendCustomMail("1");
        $c2p->setCustomerPhone("0654532178");
        $c2p->setCustomerEmail("achraf@gmail.com");
       
        

        
         
        
         
        
        /////////////////////////////////////////////////
        
        //////////////// Callback URLs //////////////////
        
        /////////////////////////////////////////////////
        
         
        
        // URL1 (Captcha) link of back to merchant website
        
        $c2p->setUrl1('');
        
        // URL2 (Captcha) Reservation created notification (Advice)
        
        $c2p->setUrl2('');
        
        // URL3 (Server to Server) Checking reservation for payment
        
        $c2p->setUrl3('');
        
        // URL3 (Server to Server) Notification when a reservation is payed
        
        $c2p->setUrl4('https://90cc-102-53-10-153.eu.ngrok.io/callback');
        
        // URL3 (Server to Server) Confirmation before cancel a reservation
        
        $c2p->setUrl5('');
        
         
        
        //Get form data to send
        
        //Return false if validation failed, otherwise an array
        
// if reservation is created
if($c2p->createReservation())
{
    // return an array who contain all result field
    $result = $c2p->getResult();


    // if request was a server to server type, you can print the token
    $token=$result['token'];
    $url2=$result['url2'];
    return view('result')->with(compact('token','url2'));

}else{
    // if creation failed, we can get error message
    echo $c2p->getErrorMessage();
}
}
public function callback(){
$c2p->setAcquirerId("2019120903");
$c2p->setPosId("4019120501");
$c2p->setProviderCode("0001");
$c2p->setSenderMacIndex("1");
$c2p->setAcquirerPublicOutputKey1("KTBO9XMDMDF46ABX1CGB8PGNA4YTKAAO");
$c2p->setAcquirerPublicOutputKey2("5CLPJ4OYV0PUCO8PJXCNJYE83A3599GR");
$data = $_POST;

// if is a callback payment request
if($c2p->callbackPayment($data))
{
    // return an array who contain all request field
    $request_data = $c2p->getCallbackRequestData();


    // Send a response to mark this payment as notified
    // response_code must be 0000, otherwise is not notified
    $c2p->setResponseCode('0000');
}else{
    // else we can get error message
    $error_message = $c2p->getErrorMessage();
	$c2p->setResponseCode('9999');
}

$response = $c2p->returnPaymentResponse($data);
echo json_encode($response) ;

exit ;
}
}