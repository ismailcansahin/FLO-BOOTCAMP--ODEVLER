<?php
require_once 'baglan.php';
$baglan = baglan();

$islem= $_GET["islem"];
$kayitno=$_GET["id"];

    if($islem == "form"){
        $sorgu= $baglan->prepare("delete from form where (id=?)");
        $sil = $sorgu->execute(array($kayitno));
        $sorgu->closeCursor(); unset($sorgu);
        echo "<script>
        alert('Başarılı: Kayıt Silindi!');
        window.top.location = 'form.php';
        </script>";
        }
    else{
        echo "<script>
        alert('Hata: Kayıt Silinemedi!');
        window.top.location = 'form.php';
        </script>";
    }