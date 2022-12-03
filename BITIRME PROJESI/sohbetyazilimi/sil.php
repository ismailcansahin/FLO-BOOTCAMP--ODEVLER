<?php
session_start();
error_reporting(0);
require_once 'baglan.php';

// Oturum Kontrolü
if($_SESSION["giris"] != sha1(md5($_SESSION['email']))){
    header("Location: cikis.php");
}

// Yönetim panelinden kullanıcı silme için gerekli class
class sil {
    private $islem;
    private $kayıtno;
    private $baglan;

    public function __construct($islem, $kayitno, $baglan){
        $this->islem = $islem;
        $this->kayitno = $kayitno;
        $this->baglan = $baglan;

        if($this->islem == "users"){
            $sorgu= $this->baglan->prepare("delete from users where (user_id=?)");
            $sil = $sorgu->execute(array($this->kayitno));
            $sorgu->closeCursor(); unset($sorgu);
            echo "<script>
            alert('Başarılı: Kayıt Silindi!');
            window.top.location = 'userlist.php';
            </script>";
            }
        else{
            echo "<script>
            alert('Hata: Kayıt Silinemedi!');
            window.top.location = 'userlist.php';
            </script>";
        }
    }
}

// Veri tabanından kullanıcı silme işlemleri
$islem= $_GET["islem"];
$kayitno=$_GET["id"];

    if($islem == "users"){
        $sorgu= $baglan->prepare("delete from users where (user_id=?)");
        $sil = $sorgu->execute(array($kayitno));
        $sorgu->closeCursor(); unset($sorgu);
        echo "<script>
        alert('Başarılı: Kayıt Silindi!');
        window.top.location = 'userlist.php';
        </script>";
        }
    else{
        echo "<script>
        alert('Hata: Kayıt Silinemedi!');
        window.top.location = 'userlist.php';
        </script>";
    }

    ?>