<?php 

session_start();

if(isset($_POST['submit_pass']) && $_POST['pass']) {
 $pass=$_POST['pass'];
 if($pass=="friend") {
  $_SESSION['password']=$pass;
  $_SESSION['userReference'] = uniqid();
 }
 else {
  $error="Incorrect Password";
 }
}

if(isset($_POST['page_logout'])) {
 unset($_SESSION['password']);
}


if(isset($_POST['collect-form-submit'])) {
    $_SESSION['userName'] =  $_POST['username'];
    $_SESSION['userMail'] =   $_POST['usermail'];
    $_SESSION['userPhone'] =  $_POST['userphone'];
    $_SESSION['userPaymentAmount']  = (int) $_POST['amount'];
    $_SESSION['userPaymentCurrency']  =  $_POST['currency'];
   
    
    /* Autentication reqeust */

    if(!$_SESSION['access_token']){

        $headers = array(
            'Content-Type: application/x-www-form-urlencoded;charset=UTF-8',
        );
        $body = array(
            "grant_type" => 'password',
            "client_id" => '00df623f-fb0c-4c5a-b2a7-88d469d08809',
            "client_secret" => '57999661-a43b-4fde-bf76-3d11e61f4b16',
            "username" => 'ave637b436fadff01.86527928@volt.io',
            "password" => '%Ntg03f@$X4FC*96M&!l2JLq8Rj#1dh1',
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.sandbox.volt.io/oauth');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($body)); // as volt.io uses form-urlencoded content-type, we need to make proper string instead of typical json

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        $result_parse = json_decode($response, TRUE);
        $_SESSION['access_token'] = $result_parse['access_token'];
        $_SESSION['refresh_token'] = $result_parse['refresh_token'];
    
    }

    if($_SESSION['access_token']) {

        /* Payment reqeust */
        $headers = array(
            'Authorization: Bearer '.$_SESSION['access_token'],
            'Content-Type: application/json',
        );
        $body = array(
            "currencyCode" => $_SESSION['userPaymentCurrency'],
            "amount" => $_SESSION['userPaymentAmount'],
            "type" => "OTHER",
            "uniqueReference" => uniqid(),
            "bank"  => "43a54bd7-dcc2-444c-9b00-ea9ce813705a", # Volt Mock Bank in UK ID which accept EUR and GPB 
            "paymentSuccessUrl" => "http://volt.test/success.php/",
            "payer" => array (
                "reference" => $_SESSION['userReference'],
                "email" => $_SESSION['userMail'],
                "name" => $_SESSION['userName'],
            ),
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.sandbox.volt.io/v2/payments');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));

        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        $result_parse = json_decode($response, TRUE);

        var_dump($result_parse);
        var_dump($_SESSION);
        header('Location: '.$result_parse['checkoutUrl']);
    }
}

?>