<?php
session_start();
error_reporting(0);
require_once('baglan.php');

// Gelen kullanıcı bilgilerine göre veritabanından eşleşen verilerin kontrolü
if($_POST){
    $kullanici = $_POST["kullanici"];
    $parola = $_POST["parola"];

    $sorgu = $baglan->prepare("select * from users where email = ? && parola = ?");
    $sorgu->execute(array($kullanici,$parola));
    $uye = $sorgu->fetch(PDO::FETCH_ASSOC);
    $kayitsay = $sorgu->rowCount();
    
    if($kayitsay > 0){
        $_SESSION["giris"]=sha1(md5($kullanici));
        $_SESSION["user_id"]=$uye["user_id"];
        $_SESSION["adsoyad"]=$uye["adsoyad"];
        $_SESSION["email"]=$kullanici;

        echo "<script> alert ('GİRİŞ BAŞARILI!');
        window.location.href='chat.php'
        </script>";
    }
    else{
        echo "<script> alert ('HATALI KULLANICI BİLGİSİ!');
        window.location.href='login.php'
        </script>";
    }
}
?>

<!-- Giriş sayfası html kodları başlangıcı -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="css/login_style.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Giriş ve Kayıt Sayfası</title>
</head>
<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Giriş Yap</span>
                <form action="" method="post">
                    <div class="input-field">
                        <input type="text" name="kullanici" placeholder="E-posta adresi giriniz" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" name="parola" placeholder="Şifre" required>
                        <i class="uil uil-lock icon "></i>
                    </div>
                    <div class="input-field button">
                        <input type="submit" value="Giriş Yap">
                    </div>
                </form>
                <div class="login-signup">
                    <span class="text">Üye değil misin ?</span>
                    <a href="singup.php" class="text signup-text">Hemen Kaydol</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Sayfa Alt Kısımda ki FLO Logosu -->
    <div class="logo">
            <img src="img/flologo.png" alt="">
    </div>

<script src="" type="s">

</script>    
</body>
</html>
