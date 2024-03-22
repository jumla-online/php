<?php
$phone_number = "0741998542";
$country_code = 254;
$Phone_number =($country_code.intval($phone_number));

date_default_timezone_set('Africa/Nairobi');
$consumer_key = 'D6UVFW0NqI4Sir9HdLMeJIlGy0yX6YVXi76348J2yfnnlkev';
$consumer_secret = 'qmhTOxyzaJfxYtlt0y2bZm7uORobP46TNG8t24KpNCxOAL6TnGdh65DAQPZYD4IL';
$Business_Code = '174379';
$Passkey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
$Type_of_Transaction = 'CustomerPayBillOnline';
$Token_URL = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$phone_number =  $Phone_number;
$total_amount = 1;
$CallBackURL = 'https://www.my-market.co.ke/Callback_main/callbackurl_main.php';
$Time_Stamp = date("Ymdhis");
$password = base64_encode($Business_Code . $Passkey . $Time_Stamp);
    
$headers = ['Content-Type:application/json; charset=utf8'];
$curl = curl_init($Token_URL);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_HEADER, FALSE);
curl_setopt($curl, CURLOPT_USERPWD, $consumer_key . ':' . $consumer_secret);
$result = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$result = json_decode($result);
$access_token = $result->access_token;
curl_close($curl);

echo $access_token;