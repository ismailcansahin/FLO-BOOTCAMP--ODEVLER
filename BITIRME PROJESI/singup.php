<?php
session_start();
require_once('baglan.php');
error_reporting(0);

// Kullanıcı kayıt işlemleri için gerekli class
class kayit {
    private $adsoyad;
    private $email;
    private $sifre;
    private $sifretekrar;
    private $resim;

    public function __construct($adsoyad, $email, $sifre, $sifretekrar, $resim, $baglan) {
        $this->adsoyad = $adsoyad;
        $this->email = $email;
        $this->sifre = $sifre;
        $this->sifretekrar = $sifretekrar;
        $this->resim = $resim;
        $this->baglan = $baglan;


        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL) === true){
            echo "<script> alert ('Lütfen Geçerli Bir E-mail Giriniz!');
            </script>";
        }
        else if ($sifre != $this->sifretekrar){
            echo "<script> alert ('Girdiğiniz Şifreler Uyuşmamaktadır!');
            </script>";
        }
        else{
            $sorgu = $this->baglan->prepare("insert into users values (?,?,?,?,?,?)");
            $ekle = $sorgu->execute(array(NULL,"$this->adsoyad","$this->email","$this->sifre","$this->resim","1"));
            if($ekle){
                echo "<script> alert ('KAYIT BAŞARILI!');
                window.location.href='login.php';
            </script>";
            }
            else{
                echo "<script> alert ('Bir Hata Oluştu!');
            </script>";
            }
        }
    }
}

// Kullanıcı kayıt işlemleri
if ($_POST){
    $adsoyad = $_POST["adsoyad"];
    $email = $_POST["email"];
    $sifre = $_POST["sifre"];
    $sifretekrar = $_POST["sifretekrar"];

    $resim = "img/".$_FILES["image"][name];
    move_uploaded_file($_FILES["image"][tmp_name], $resim);
 
    $kayitkontrol = new kayit($adsoyad, $email, $sifre, $sifretekrar, $resim, $baglan);
}

?>

<!-- Kayıt sayfası html kodları başlangıcı -->
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="css/singup.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Giriş ve Kayıt Sayfası</title>
</head>
<body>
<div class="container">
    <div class="forms">
        <div class="form login">
            <span class="title">Kullanıcı Bilgileri</span>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="input-field">
                    <input type="text" name="adsoyad" placeholder="Ad Soyad" required>
                    <i class="uil uil-user"></i>
                </div>
                <div class="input-field">
                    <input type="text" name="email" placeholder="E-posta" required>
                    <i class="uil uil-envelope icon"></i>
                </div>
                <div class="input-field">
                    <input type="password" name="sifre" placeholder="Şifre" required>
                    <i class="uil uil-lock icon "></i>
                </div>
                <div class="input-field">
                    <input type="password" name="sifretekrar" placeholder="Şifre Tekrar" required>
                    <i class="uil uil-lock icon "></i>
                </div>
                <div class="input-field image">
                    <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                    <i class="uil uil-image-upload"></i>
                </div>
                <div class="input-field button">
                    <input type="submit" value="Kayıt Ol">
                </div>
            </form>
            <div class="login-signup">
                <span class="text">Hesabınız Var mı ?</span>
                <a href="login.php" class="text signup-text">Hemen Giriş Yap</a>
            </div>
        </div>
    </div>
</div>

<!-- Sayfa Alt Kısımda ki FLO Logosu -->
<div class="logo">
        <img src="img/flologo.png" alt="">
</div>

<script src="js/script.js" type="text/javascript"></script>    
</body>
</html>
