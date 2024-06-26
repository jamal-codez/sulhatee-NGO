<?php 
// include ("_includes/connection.php");
// session_start();
// $t=$_GET['t'];
//     $ref=$_GET['ref'];
// $payment_details = $_SESSION['payment_details'];
//     $name = $payment_details['name'];
//     $phone = $payment_details['phone'];
//     $amount = $payment_details['amount'];
//     $recipients = '07019188467';
    
    
    
        // $email = "alubaidullahi080@gmail.com";
        // $password = "!@#Dreampeople080";
        // //$message = $content;
        // $message="Thank you Mr/Mrs ".$name." for donating the sum of ".$amount." to Sulhatee foundation.";
        // $sender_name = "Sulhatee";
        // $forcednd = "1";

        // $data = array(
        //     "email" => $email,
        //     "password" => $password,
        //     "message" => $message,
        //     "sender_name" => $sender_name,
        //     "recipients" => $recipients,
        //     "forcednd" => $forcednd
        // );

        // $data_string = json_encode($data);
        // $ch = curl_init('https://app.multitexter.com/v2/app/sms');
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($data_string)));
        // $result = curl_exec($ch);
        // $res_array = json_decode($result, true);

      
        // // echo $message;
        // // // echo $res_array;
        // header('Location: invoice.php?t='.$t.'&ref='.$ref);
        // exit;

        // // if($res_array['status'] != 1){
        // //     // header('Location: invoice.php?t='.$trans_id.'&ref='.$ref);
        // //     // exit;
        // //     echo "UNSENT";
        // // }else{
        // //     // header('Location: invoice.php?t='.$trans_id.'&ref='.$ref);
        // //     // exit;
        // //     echo "SENT";
        // // }
        
        
        


$apiKey = 'mlsn.bba6934bd2546a1fdb7dd715f6a3bc8ab225675d14aeb1c3eb3c93f39e7455f5';
$from = '+12065550101';
$to = ['+12065550102', '+12065550103'];
$text = 'Text';

$data = [
    'from' => $from,
    'to' => $to,
    'text' => $text
];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.mailersend.com/v1/sms');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$headers = [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'cURL Error: ' . curl_error($ch);
} else {
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($http_code == 200) {
        echo 'Response: ' . $response;
    } else {
        echo 'HTTP Code: ' . $http_code . "\n";
        echo 'Response: ' . $response;
    }
}

curl_close($ch);



?>
