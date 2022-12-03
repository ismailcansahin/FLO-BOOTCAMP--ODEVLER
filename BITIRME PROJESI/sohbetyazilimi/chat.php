<?php
session_start();
require_once('baglan.php');
error_reporting(0);

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
            <!-- Giriş yapılan hesap bilgilerinin header kısmında kullanımı -->
            <header>
                <?php 
                $uyeid = $_SESSION["user_id"];
                        
                $sorgu = $baglan->query("select * from users where user_id = '{$uyeid}'");
                $uye = $sorgu->fetch(PDO::FETCH_ASSOC);       
                ?>
                
                <div class="details">
                    <img src="<?php echo $uye['resim']; ?>" alt="">
                    <span><?php echo $uye['adsoyad']; ?></span>
                </div>
                <a href="cikis.php" class="logout">Çıkış</a>
            </header>

            <!-- Sohbet geçmişinin basılacağı alan başlangıcı -->
            <div class="chat-box" id="chatbox">
                
            </div>
            <form action="#" class="typing-area">
                <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $uye['adsoyad'] ?>" hidden>
                    <!-- Input alanının verilen izine göre aktif veya kapalı olma izni -->
                    <?php
                        if($uye['durum'] == 1){
                            echo "<input type='text' name='message' class='input-field' placeholder='Bir mesaj yaz..' autocomplete='off'>";
                        }
                        else if($uye['durum'] == 0){
                            echo "<input type='text' name='message' class='input-field' placeholder='Bir mesaj yaz..' autocomplete='off' disabled>";
                        }
                    ?>
                <button id="send-btn"><i class="uil uil-message"></i></button>
            </form>
        </section>
    </div>

    <!-- Sayfa Alt Kısımda ki FLO Logosu -->
    <div class="logo">
            <img src="img/flologo.png" alt="">
    </div>
    
    <!-- Jquery Başlangıcı -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>

        // Ajax Kodlarının başlangıcı
        $(document).ready(function() {
            var scrollDown = function(){
                let chatBox = document.getElementById('chatbox');
                chatBox.scrollTop = chatBox.scrollHeight;
            }
        scrollDown();

            $("#send-btn").on("click",function(){
                $.ajax({
                    cache: false,
                    url: 'message.php',
                    type: 'POST',
                    data: "incoming_id=" + $(".incoming_id").val() + "&message=" + $(".input-field").val(),
                    dataType:"text",
                    success: function(result){
                        $(".chat-box").append(result);
                        $(".chat-box").scrollTop($(".chat-box")[0].scrollHeight);
                    },
                    error: function (xhr) {
                        $(".chat-box").html("Hata:" + xhr.status + "" + xhr.statusText);
                }
                })
            });
            
            // Gelen mesajların belirli aralıklarla yenilenmesi için gerekli kod
            setInterval(function(){
                $.ajax({
                    url:"realTime.php",
                    method:"POST",
                    data:"incoming_id=" + $(".incoming_id").val(),
                    dataType:"text",
                    success:function(result){
                        $(".chat-box").html(result);
                    }
                });
            },250);
        });
    </script>
</body>
</html>

