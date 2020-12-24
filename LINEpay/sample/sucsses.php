<?php

// DB接続情報
$dbn = 'mysql:dbname=20201225_web_teammmc;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = 'root';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

$userId = $_COOKIE['user_id'];
// var_dump($userId);
// exit();

// $buy = 1;

// idを指定して更新するSQLを作成（UPDATE文）
// $sql = "UPDATE users SET hasTemp=:hasTemp WHERE id=:id";
// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':hasTemp', $buy, PDO::PARAM_INT);
// $stmt->bindValue(':id', $userId, PDO::PARAM_INT);
// $status = $stmt->execute();

// idを指定して更新するSQLを作成（UPDATE文）
$sql = "UPDATE users SET hasTemp = 1 WHERE id=$userId";
$stmt = $pdo->prepare($sql);

// ここを入れないと動かない！
$stmt->execute($params);

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
        <div class="template">
            <button class="LINEpaybtn"> <a href="http://localhost/20201225_Web_TeamMMC/public/list">HOME</a></button>
            <p class="msg">購入ありがとうございました。上の「HOME」を押すことでテンプレートをご利用頂けます</p>
        </div>



    </div>
</body>

</html>
