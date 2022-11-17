<?php
$mysqlsunucu = "localhost";
$mysqlkullanici = "mehmet";
$mysqlsifre = "1234";

$baglan = new PDO("mysql:host=$mysqlsunucu;dbname=telefonrehberi;charset=utf8", $mysqlkullanici, $mysqlsifre);
$baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
