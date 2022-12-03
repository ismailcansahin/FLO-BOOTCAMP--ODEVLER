<?php
require_once 'baglan.php';
error_reporting(0);

if($_SESSION["giris"] != sha1(md5($_SESSION['email']))){
    header("Location: cikis.php");
}

// yonetici_index.php sayfasından gelen veriye göre, 1 ise aktif 0 ise kapalı olma durumunun veri tabanında değiştirilme işlemi
$id= $_GET["id"];
$durum=$_GET["durum"];

    if($durum == 1){
        $sorgu= $baglan->prepare("update users set durum=? where user_id=?");
        $guncelle = $sorgu->execute(array(0,$id));
        header("Location: yonetici_index.php");
        }
    else if($durum == 0){
        $sorgu= $baglan->prepare("update users set durum=? where user_id=?");
        $guncelle = $sorgu->execute(array(1,$id));
        header("Location: yonetici_index.php");
    };

    ?>