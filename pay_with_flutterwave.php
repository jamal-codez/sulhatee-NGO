<?php 
include ("_includes/connection.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Payment initialization
    if (isset($_POST['name'], $_POST['phone'], $_POST['amount'], $_POST['cat'], $_POST['subcat'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $amount = $_POST['amount'];
        $cat = $_POST['cat'];
        $subcat = $_POST['subcat'];
        $trans_ref = uniqid();

        $_SESSION['payment_details'] = array(
            'name' => $_POST['name'],
            'phone' => $_POST['phone'],
            'amount' => $_POST['amount'],
            'cat' => $_POST['cat'],
            'subcat' => $_POST['subcat']
        );

        //Integrate Rave payment
        $endpoint = "https://api.flutterwave.com/v3/payments";

        //Required Data
        $postdata = array(
            "tx_ref" => uniqid() . uniqid(),
            "currency" => "NGN",
            "amount" => $amount,
            "customer" => array(
                "name" => $name,
                "phone" => $phone,
                "email" => "sulhateeFoundation@gmail.com"
            ),
            "customizations" => array(
                "title" => "SulhateeFoundation",
                "description" => "Purchase of SulhateeFoundation"
            ),
            "meta" => array(
                "reason" => "SulhateeFoundation to Sulhatee Foundation"
            ),
            // "redirect_url" => "http://localhost/sulhatee/donate2.php"
            "redirect_url" => "https://sulhateefoundation.org.ng/pay_with_flutterwave.php"
        );

        // Init cURL handler
        $ch = curl_init();

        // Turn off SSL checking
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        // Set the endpoint
        curl_setopt($ch, CURLOPT_URL, $endpoint);

        // Turn on the cURL post method
        curl_setopt($ch, CURLOPT_POST, 1);

        // Encode the post field
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postdata));

        // Make it return data
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Set the waiting timeout
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 200);
        curl_setopt($ch, CURLOPT_TIMEOUT, 200);

        // Set the headers from endpoint
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer FLWSECK-XXXXXXXXXXXXXX-XXXXXXXX-X",
            "Content-Type: Application/json",
            "Cache-Control: no-cahe"
        ));

        // Execute the cURL session
        $request = curl_exec($ch);

        $result = json_decode($request);

        // Check if payment link is generated successfully
        if ($result && isset($result->data->link)) {
            sleep(3);
            header("Location: ".$result->data->link);
            exit();
        } else {
            echo "Failed to generate payment link.";
            var_dump($result);
        }

        // Close the cURL session
        curl_close($ch);
    }

    // Payment callback handling
    
}

if ($_SERVER["REQUEST_METHOD"] == "GET"){
    if (isset($_GET['status'])) {
        // Extract payment status and transaction reference from the callback/notification
        $payment_status = $_GET['status'];
        // $transaction_ref = $_POST['tx_ref'];

        // Verify that the payment status is successful
        if ($payment_status == 'completed') {
            $payment_details=$_SESSION['payment_details'];
            $name = $payment_details['name'];
            $phone = $payment_details['phone'];
            $amount = $payment_details['amount'];
            $cat = $payment_details['cat'];
            $subcat = $payment_details['subcat'];
            $dd=date("Y-m-d");
            $insert_query = "INSERT INTO donations (name, phone, amount, cat, sub_cat, date) 
                             VALUES ('$name', '$phone', '$amount', '$cat', '$subcat', '$dd')";

            if(mysqli_query($conn, $insert_query)) {
                // Redirect to suc_pay.php after successful payment
                // if(isset($phone)){
                //     header('Location: sms.php?t='.$trans_id.'&ref='.$ref);

                // }else{
                //     header('Location: invoice.php');
                //     exit;

                // }
                header('Location: invoice.php');
                exit;
            } else {
                header('Location: index.php');
                echo "Failed to record payment in the database.";
            }
        } else {
            header('Location: index.php');
            echo "Payment was not successful.";
        }
        
    } else {
        header('Location: index.php');
            echo "Payment was not successful.";
            
    }
}
?>
