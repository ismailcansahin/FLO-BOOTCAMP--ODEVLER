<?php
session_start();
include("ayar.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telefon Rehberi Kayıt</title>
</head>
<body style="text-align:center;">

    <div style="text-align:center;">
        <a href= "form.php">KAYIT SAYFASI<a> -
        <a href= "liste.php">LİSTE SAYFASI<a> -
    </div>
    <br><hr><br><br>

    <form action="kayıt.php" method="post">
        <b>Adınız Soyadınız:</b><br>
        <input type="text" name=isim required><br><br>
        <b>Telefon Numaranız:</b><br>
        <input type="text" name=numara required><br><br>
        <input type="submit" value="Bilgileri Kaydet">
    </form>



</body>
</html>