<?php

require __DIR__ . '/_config.php';

// Route process
$route = isset($_GET['route']) ? $_GET['route'] : null;
switch ($route) {
    case 'clear':
        session_destroy();
        // Redirect back
        header('Location: ./index.php');
        break;

    case 'order':
    case 'index':
    default:
        # code...
        break;
}

// Get the order from session
$order = isset($_SESSION['linePayOrder']) ? $_SESSION['linePayOrder'] : [];
// Get last form data if exists
$config = isset($_SESSION['config']) ? $_SESSION['config'] : [];

?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/rogo.icon">
    <title>omoite</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/sanitize.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="login_body">
    <div class="rogo_box">
        <img src="img/rogo.png" alt="" class="rogo">
    </div>
    <div class="area">
        <h1 class="store">Template store</h1>
        <img src="img/sample.jpg" alt="" class="sample">

        <form method="POST" action="request.php" class="template">
            <input type="hidden" name="productName" value="卒業アルバムテンプレート">
            <input type="hidden" name="amount" value="5">
            <button type="send" class="LINEpaybtn">LINEpayで購入</button>
        </form>

    </div>
</body>

</html>
