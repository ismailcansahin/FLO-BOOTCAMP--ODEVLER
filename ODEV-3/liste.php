<?php
session_start();
include("ayar.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telefon Rehberi Liste</title>
</head>
<body style="text-align:center;">

    <div style="text-align:center;">
        <a href= "form.php">KAYIT SAYFASI<a> -
        <a href= "liste.php">LİSTE SAYFASI<a> -
    </div>
    <br><hr><br><br>

    <b>Liste Sayfası</b><br><br>

    <table width="100%" border="1">
        <tr>
            <th>Adı Soyadı</th>
            <th>Telefon Numarası</th>
            <th>İşlem</th>
        </tr>
            <?php
                $sirano = 0;
                $sorgu = $baglan->query("select * from form");
                    while($satir = $sorgu->fetch(PDO::FETCH_OBJ)) {
                        $sirano++;
                        echo "<tr>
                        <td>$satir->adsoyad</td>
                        <td>$satir->telefon</td>
                        <td><a href='kayıt.php?islem=sil&adsoyad=$satir->adsoyad'>Sil</a></td>
                        </tr>";
                    }
                
            ?>
        <tr>
            <td>
                <?php
                echo "Sistemde Toplam -".$sorgu->rowCount()."- Kayıt Var.";
                ?>
            </td>
        </tr>

    </table>



</body>
</html>