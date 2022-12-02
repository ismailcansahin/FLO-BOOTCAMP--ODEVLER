<?php
session_start();
require_once('baglan.php');
error_reporting(0);

// Gelen giriş bilgilerinin veri tabanı ile eşleştirilmesi işlemi
if($_SESSION["giris"] != sha1(md5($_SESSION['email']))){
    header("Location: cikis.php");
}
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="css/chat.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Flo Sohbet Yazılımı</title>
</head>
<body style="text-align: center">
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <!-- Yönetici Paneli Header -->
                <?php 
                $uyeid = $_SESSION["user_id"];
                $sorgu = $baglan->query("select * from admin where user_id = '{$uyeid}'");
                $uye = $sorgu->fetch(PDO::FETCH_ASSOC);       
                ?>
                
                <div class="details">
                    <img src="<?php echo $uye['resim']; ?>" alt="">
                    <span><?php echo $uye['adsoyad']; ?></span>
                </div>

                <!-- Yönetici Paneli Navbar -->
                <a href="yonetici_index.php" style="background:#d5d5d5" class="logout">Sohbet İzinleri</a>
                <a href="userlist.php" style="background:#d5d5d5" class="logout">Kullanıcılar</a>
                <a href="userlist.php" style="background:#FE6A01" class="logout">Sohbet Temizleme</a>
                <a href="cikis.php" class="logout">Çıkış</a>
                
            </header>
            
            <div class="chat-box" id="chatbox">
                <div class="userlist">
                    <!-- Yönetim panelinden tüm sohbet geçmişini silmek get metodu kullanıldı. Gerekli kodlar clear.php sayfasında -->
                        <div class="useraccount">
                            <a href="clear.php?islem=clear"><i class="uil uil-trash-alt" style= "color:#FF6464; font-size:30px"></i></a>
                            <span>TEMİZLEMEK İÇİN TIKLAYINIZ</span> 
                        </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Sayfa Alt Kısımda ki FLO Logosu -->
    <div class="logo">
            <img src="img/flologo.png" alt="">
    </div>

    <script>
        
    </script>
</body>
</html>


