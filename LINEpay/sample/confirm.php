<?php

require __DIR__ . '/_config.php';

// Get saved config
$config = $_SESSION['config'];
// Create LINE Pay client
$linePay = new \yidas\linePay\Client([
    'channelId' => '1655423209',
    'channelSecret' => 'a712ce82b8e115ab62940c4cac5258ae',
    'isSandbox' => ($config['isSandbox']) ? true : false,
]);

// Successful page URL
$successUrl = './sucsses.php';
// Get the transactionId from query parameters
$transactionId = (string) $_GET['transactionId'];
// Get the order from session
$order = $_SESSION['linePayOrder'];

// Check transactionId (Optional)
if ($order['transactionId'] != $transactionId) {
    die("<script>alert('TransactionId doesn\'t match');location.href='./store.php';</script>");
}

// Online Confirm API
try {

    $response = $linePay->confirm($order['transactionId'], [
        'amount' => (int) $order['params']['amount'],
        'currency' => $order['params']['currency'],
    ]);
} catch (\yidas\linePay\exception\ConnectException $e) {

    // Implement recheck process
    die("Confirm API timeout! A recheck mechanism should be implemented.");
}

// Save error info if confirm fails
if (!$response->isSuccessful()) {
    $_SESSION['linePayOrder']['confirmCode'] = $response['returnCode'];
    $_SESSION['linePayOrder']['confirmMessage'] = $response['returnMessage'];
    $_SESSION['linePayOrder']['isSuccessful'] = false;
    die("<script>alert('Refund Failed\\nErrorCode: {$_SESSION['linePayOrder']['confirmCode']}\\nErrorMessage: {$_SESSION['linePayOrder']['confirmMessage']}');location.href='{$successUrl}';</script>");
}

// Code for saving the successful order into your application database...
$_SESSION['linePayOrder']['isSuccessful'] = true;

// Redirect to successful page
header("Location: {$successUrl}");
