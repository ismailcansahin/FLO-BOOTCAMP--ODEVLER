<?php
session_start();
include("ayar.php");

if($_POST){
    $isim = $_POST["isim"];
    $numara = $_POST["numara"];
    $sorgu = $baglan->prepare("insert into form values (?,?,?)");
    $ekle = $sorgu->execute(array(NULL,$isim,$numara));
    echo "<script>window.location.href='form.php';</script>";
}

$islem = $_GET["islem"];

if($islem == "sil") {
    $adsoyad = $_GET["adsoyad"];
    $sorgu = $baglan->prepare("delete from form where adsoyad=?");
    $sil = $sorgu->execute(array($adsoyad));
    echo "<script>window.location.href='liste.php';</script>";
}
?>




