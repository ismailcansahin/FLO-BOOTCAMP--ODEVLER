<?php
session_start();
error_reporting(0);
require_once('baglan.php');

// Oturum Kontrolü
if($_SESSION["giris"] != sha1(md5($_SESSION['email']))){
    header("Location: cikis.php");
}

// cheatclear.php sayfasından gelen komut ile tüm sohbet geçmişinin veri tabanından silinme işlemi
$islem= $_GET["islem"];

    if($islem == "clear"){
        $clear= $baglan->exec("delete from message");
        echo "<script>
            alert('Başarılı: Tüm Sohbet Geçmişi Silindi!');
            window.top.location = 'chatclear.php';
            </script>";
        }

    else{
        echo "<script>
            alert('Hata: Kayıt Silinemedi!');
            window.top.location = 'chatclear.php';
            </script>";
    }
?>