<?php

// var_dump($_POST);
// exit();

require __DIR__ . '/_config.php';

// Get Base URL path without filename
$baseUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . dirname($_SERVER['PHP_SELF']);
$input = $_POST;
$input['isSandbox'] = (isset($input['isSandbox'])) ? true : false;

// Create LINE Pay client
$linePay = new \yidas\linePay\Client([
    'channelId' => '1655423209',
    'channelSecret' => 'a712ce82b8e115ab62940c4cac5258ae',
    'isSandbox' => $input['isSandbox'],
]);

// Create an order based on Reserve API parameters
$orderParams = [
    "amount" => (int) $input['amount'],
    "currency" => 'JPY',
    "orderId" => "SN" . date("YmdHis") . (string) substr(round(microtime(true) * 1000), -3),
    "packages" => [
        [
            "id" => "pid",
            "amount" => (int) $input['amount'],
            "name" => "Package Name",
            "products" => [
                [
                    "name" => $input['productName'],
                    "quantity" => 1,
                    "price" => (int) $input['amount'],
                    "imageUrl" => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/LINE_logo.svg/220px-LINE_logo.svg.png',
                ],
            ],
        ],
    ],
    "redirectUrls" => [
        "confirmUrl" => "{$baseUrl}/confirm.php",
        "cancelUrl" => "{$baseUrl}/store.php",
    ],
    "options" => [
        "display" => [
            "checkConfirmUrlBrowser" => true,
        ],
    ],
];

// Online Reserve API
$response = $linePay->request($orderParams);

// Check Reserve API result
if (!$response->isSuccessful()) {
    die("<script>alert('ErrorCode {$response['returnCode']}: " . addslashes($response['returnMessage']) . "');history.back();</script>");
}

// Save the order info to session for confirm
$_SESSION['linePayOrder'] = [
    'transactionId' => (string) $response["info"]["transactionId"],
    'params' => $orderParams,
    'isSandbox' => $input['isSandbox'],
];
// Save input for next process and next form
$_SESSION['config'] = $input;

// Redirect to LINE Pay payment URL 
header('Location: ' . $response->getPaymentUrl());
