<?php
require_once('baglan.php');
$baglan = baglan();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Kayıt Sayfası</title>
</head>
<body>
<div class="container">
    <div class="forms">
        <div class="form login">
            <span class="title">Kullanıcı Kimlik Bilgileri</span>
            <form action="kayıt.php" method="post">
                <div class="input-field">
                    <input type="text" placeholder="Ad Soyad" name="adsoyad" required>
                    <i class="uil uil-user"></i>
                </div>
                <div class="input-field">
                    <input type="text" placeholder="Tc Kimlik Numarası" name="tckimlik" required>
                    <i class="uil uil-sitemap"></i>
                </div>
                <div class="input-field button">
                    <input type="submit" value="Doğrula ve Kaydet">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="table-container">
    <table class="table-content">
        <tr>
            <td class="table-id" style="color: #ff6b01"><b>ID</b></td>
            <td class="table-name" style="color: #ff6b01"><b>AD SOYAD</b></td>
            <td class="table-tc" style="color: #ff6b01"><b>TC KİMLİK NO</b></td>
            <td class="table-durum" style="color: #ff6b01"><b>DURUM</b></td>
            <td class="table-id" style="color: #ff6b01"><b>SİL</b></td>
        </tr>
    <?php
        $sorgu = $baglan->prepare("select * from form");
        $sorgu->execute();
        $sirano = 0;
        foreach($sorgu as $satir){
            $sirano++;
            echo "<tr>
            <td class='table-id'>$sirano</td>
            <td class='table-name'>$satir[adsoyad]</td>
            <td class='table-tc'>$satir[tckimlik]</td>
            <td class='table-durum'>$satir[durum]</td>
            <td class='table-id'>
            <a class='link' href='sil.php?islem=form&id=$satir[id]'><i style='color: #ff6b01' class='uil uil-multiply'></i></a>
            </td>            
            </tr>";
        }
    ?>
    </table>
</div>
<div class="logo">
        <img src="img/flologo.png" alt="">
</div>



<script src="js/script.js" type="text/javascript"></script>    
</body>
</html>
