<?php
    session_start();
    error_reporting(0);
    require_once('baglan.php');

    // Oturum Kontrolü
    if($_SESSION["giris"] != sha1(md5($_SESSION['email']))){
        header("Location: cikis.php");
    }

    // Gelen kullanıcı id sine göre mesajın gelen veya gönderilen olarak yazzdırılma döngüsü 
    $incoming_id = $_POST["incoming_id"];

    $mesaj = $baglan->query("select * from message order by msj_id asc");
    $adsoyad = $_SESSION["user_id"];
                    
    foreach($mesaj as $kutucuk){
        if($kutucuk['kullaniciname'] == $_SESSION['adsoyad']){
            echo"<div class='chat outgoing'>
                    <div class='details'>
                        <p>".$kutucuk['mesaj']."
                        </p>
                        <div class='time1'>".$kutucuk['zaman']."
                        </div>
                    </div>
                </div>";
        }
        else{
            $sorgu2 = $baglan->query("select * from users where adsoyad = '{$kutucuk['kullaniciname']}'");
            $uye2 = $sorgu2->fetch(PDO::FETCH_ASSOC);

            echo"<div class='chat incoming'>
                    <img src='".$uye2['resim']."'>
                    <div class='details'>
                        <p>".$kutucuk['mesaj']."
                        </p>
                        <div class='time2'>".$kutucuk['zaman']."
                        </div>
                    </div>                
            </div>";}
            }

?>        