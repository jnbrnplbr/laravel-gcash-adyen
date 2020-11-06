<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GcashController extends Controller
{
   public function store () {
      // Set your X-API-KEY with the API key from the Customer Area.
      $client = new \Adyen\Client();
      $client->setXApiKey("YOUR_X-API-KEY");
      $service = new \Adyen\Service\Checkout($client);
      
      $params = array(
      "amount" => array(
         "currency" => "PHP",
         "value" => 1000
      ),
      "reference" => "YOUR_ORDER_NUMBER",
      "paymentMethod" => array(
         "type" => "gcash"
      ),
      "returnUrl" => "https://your-company.com/checkout?shopperOrder=12xy..",
      "merchantAccount" => "YOUR_MERCHANT_ACCOUNT"
      );
      $result = $service->payments($params);
   }
}
