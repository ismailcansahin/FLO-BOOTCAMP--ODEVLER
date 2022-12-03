<?php
session_start();
error_reporting(0);
require_once('baglan.php');

// Oturum Kontrolü
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
                <!-- Yönetici Paneli Kullanıcılar Sayfası Header -->
                <?php 
                $uyeid = $_SESSION["user_id"];     
                $sorgu = $baglan->query("select * from admin where user_id = '{$uyeid}'");
                $uye = $sorgu->fetch(PDO::FETCH_ASSOC);       
                ?>
                
                <div class="details">
                    <img src="<?php echo $uye['resim']; ?>" alt="">
                    <span><?php echo $uye['adsoyad']; ?></span>
                </div>

                <!-- Yönetici Paneli Kullanıcılar Sayfası Navbar -->
                <a href="yonetici_index.php" style="background:#d5d5d5" class="logout">Sohbet İzinleri</a>
                <a href="userlist.php" style="background:#FE6A01" class="logout">Kullanıcılar</a>
                <a href="chatclear.php" style="background:#d5d5d5" class="logout">Sohbet Temizleme</a>
                <a href="cikis.php" class="logout">Çıkış</a>
                
            </header>
            
            <div class="chat-box" id="chatbox">
                <div class="userlist">
                    <!-- Yönetim panelinde kullanıcı silme kısmı. Gerekli kodlar sil.php sayfasında -->
                    <?php
                    $sorgu2 = $baglan->prepare("select * from users");
                    $sorgu2->execute();
                    $sirano = 0;
                    foreach($sorgu2 as $userlist){
                        $sirano++;
                        echo "
                        <div class='useraccount'>
                        <img src='".$userlist['resim']."'>
                        <span>".$userlist['adsoyad']."</span>
                        <a href='sil.php?islem=users&id=".$userlist[user_id]."'><i class='uil uil-multiply'></i></a>
                        </div>
                        ";
                    }
                    ?>
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