<?php
session_start();
error_reporting(0);
require_once('baglan.php');

$incoming_id = $_POST["incoming_id"];
// Veritabanına gelen mesajların güvenli bir şekilde yazılması 
$message = str_replace(array("insert","update","delete","select","exec","union","drop","alter"), array(), $_POST["message"]);

// Zaman damgası için gerekli kod
date_default_timezone_set('Europe/Istanbul');
$tarih = date('d.m.Y / H:i');

// Oturum Kontrolü
if($_SESSION["giris"] != sha1(md5($_SESSION['email']))){
    header("Location: cikis.php");
}

// Mesajın veri tabanına yazma işlemi
$sorgu = $baglan->prepare("insert into message values (?,?,?,?)");
$ekle = $sorgu->execute(array(NULL,$incoming_id,$message,$tarih));

?>