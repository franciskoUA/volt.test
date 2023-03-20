<?php 
session_start();

$webhookTokenID = "d5479b84-2e35-4f89-b838-aa85a5314363";

$body = array(
    $_SESSION['userName'],
    $_SESSION['userMail'],
    $_SESSION['userPhone'],
    $_SESSION['userPaymentAmount'],
    $_SESSION['userPaymentCurrency']
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://webhook.site/'.$webhookTokenID);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
$result_parse = json_decode($response, TRUE);
header('Location: https://webhook.site/#!/'.$webhookTokenID);
?>