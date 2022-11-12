<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLO SEPET</title>
</head>
<body style="text-align:center">

    <?php
    
    $urun = array ();
    $urun[0] = array ("urunadi" => "Ülker Çikolatalı Gofret 40 gr.", "fiyat" => 10);
    $urun[1] = array ("urunadi" => "Eti Damak Kare Çikolata 60 gr.", "fiyat" => 20);
    $urun[2] = array ("urunadi" => "Nestle Bitter Çikolata 50 gr.", "fiyat" => 20);

    ?>

    <form action="" method="post">
        <table border='1' width='100%'>
        <thead>
            <tr>
                <th>Ürün Adı</th>
                <th>Ürün Fiyatı</th>
                <th>Adet</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $urun[0]['urunadi']; ?></td>
                <td><?php echo $urun[0]['fiyat']." TL."; ?></td>
                <td><input type="number" name="urun0" value="0" ></td>
            </tr>
            <tr>
                <td><?php echo $urun[1]['urunadi']; ?></td>
                <td><?php echo $urun[1]['fiyat']." TL."; ?></td>
                <td><input type="number" name="urun1" value="0"></td>
            </tr>
            <tr>
                <td><?php echo $urun[2]['urunadi']; ?></td>
                <td><?php echo $urun[2]['fiyat']." TL."; ?></td>
                <td><input type="number" name="urun2" value="0"></td>
            </tr> 
        </tbody>
        </table>
        <br><br>
        <input style= "text-align:right" type="submit" value="Sepete Ekle">
        <br><br><br><br><br><br>
    </form>


    <?php


    session_start();
    

    $marka0 = $_POST['urun0'];
    $marka1 = $_POST['urun1'];
    $marka2 = $_POST['urun2'];

 
    $sepet = array ($marka0, $marka1, $marka2);

    $_SESSION['sepet']=$sepet;

    


    echo "<br>";
    
    echo "<table border='1' width='100%'>
    <tr>
    <td>Ürün Adı</td>
    <td>Adet</td>
    <td>Toplam</td>
    </tr>";

    foreach($_SESSION as $products){
        echo "<tr>";
            foreach($products as $key => $value){
                
                
           }
        echo "</tr>";
    }
    
    echo "</table>";


?>
<br><br>
<form action="" method="post">
<input style= "text-align:right" type="submit" value="Sepeti Sıfırla" name=sifirla>
</form>
<?php


if($_POST["sifirla"] == TRUE){
    session_destroy($_SESSION);
    }
?>


</body>
</html>






