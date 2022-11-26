<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <b>Ot Master v1.0</b><br><br>
    <b>Kg Başı Ot Fiyatları</b><br><br>
    <form action="" method="post">
        <b>Kekik:</b>
        <input type="text" name="kekik"><br><br>
        <b>Nane:</b>
        <input type="text" name="nane"><br><br>
        <b>Fesleğen:</b>
        <input type="text" name="feslegen"><br><br>
        <b>Reyhan:</b>
        <input type="text" name="reyhan"><br><br>
        <!-- <input type="submit" value="Fiyatları Onayla"> -->
    </form>

    <br><hr><hr><br>

    <form action="" method="post">
        <label for="tur">Tür</label>
        <select name="tur" id="tur">
            <option value="kekik">Kekik</option>
            <option value="nane">Nane</option>
            <option value="feslegen">Fesleğen</option>
            <option value="reyhan">Reyhan</option>
        </select><br><br>
            
        <label for="kg">Miktar Giriniz(kg):</label>
        <input type="text" id="kg" name="kg"/><br>
        

        <input type="radio" id="tazeid" name="tazelik" value="1">
        <label for="tazeid">Taze</label><br>
        <input type="radio" id="tazedegilid" name="tazelik" value="0">
        <label for="tazedegilid">Taze Değil</label><br> 
        <input type="submit" value="Hesapla"/><br>

    </form>

<?php
function otfiyatlari($tur){
    if ($tur == "kekik") {
        return $_POST['kekik'];
    }
    else if ($tur == "nane") {
        return $_POST['nane'];
    }
    else if ($tur == "feslegen") {
        return $_POST['feslegen'];
    }
    else if ($tur == "reyhan") {
        return $_POST['reyhan'];
    }
}

$tur = $_POST["tur"];
$otfiyat = otfiyatlari($tur);

$miktar = $_POST["kg"];
$tazelik = $_POST["tazelik"];


$islemtutar = $otfiyat * $miktar;

if($tazelik == 1) {
    if($tur == "kekik"){
        $tazeliketkisi = $islemtutar*(0.10);
    }
    else if($tur == "nane"){
        $tazeliketkisi = $islemtutar*(0.20);
    }
    else if($tur == "feslegen"){
        $tazeliketkisi = $islemtutar*(0.10);
    }
    else if($tur == "reyhan"){
        $tazeliketkisi = $islemtutar*(0.25);
    }
}
else if ($tazelik == 0)
{
    $tazeliketkisi = 0;
}
else {
    $tazeliketkisi = 0;
}

echo "Tazelik Etkisi: - $tazeliketkisi TL";

$tutar = $islemtutar - $tazeliketkisi;
$kdv = $tutar*(0.18);
$toplamtutar = $tutar + $kdv;


echo "<br><br><hr><hr><b>Ot Master v1.0</b><br><br>
<b>Kg Başı Ot Fiyatları</b><br><br>
Kekik: 50<br><br>
Nane: 50<br><br>
Fesleğen: 50<br><br>
Reyhan: 50 <br><br>
*************************************<br><br>
Tür:$tur <br><br>
-$tur- miktar (kg):$miktar <br><br>
Taze mi ?<br><br>
İşlem tutar: $islemtutar <br><br>
Tazelik etkisi: -$tazeliketkisi <br><br>
Tutar: $tutar TL <br><br>
KDV (%18) :$kdv <br><br>

*************************************<br><br>
OT. A.Ş <br><br>

$tur: $miktar kg x 50TL = $tutar<br><br>
";

if($tazelik == 1) {
    echo "Taze.<br><br>";
}
else if($tazelik == 0) {
    echo "Taze Değil.<br><br>";
}

echo "KDV (%18): $kdv TL<br><br>
Genel Toplam: $toplamtutar";



?>




</body>
</html>