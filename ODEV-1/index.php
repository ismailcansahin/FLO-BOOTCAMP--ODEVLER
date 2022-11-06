<?php
$agil = array (
    "sayi" => 3 ,
    "kapasite" => 45 ,
    "toplamkoyun" => 147
);

$toplamkoyun = $agil["toplamkoyun"];
$toplamkapasite = $agil["kapasite"]*$agil["sayi"];


echo "Toplam Ağıl: " . $agil["sayi"] . "<br>";
echo "Toplam Kapasite: $toplamkapasite <br>";
echo "Toplam Koyun: " . $agil["toplamkoyun"] . "<br><br>";


for($i=$agil["sayi"]; $i >= 1; $i--) {
    if($toplamkoyun >= $agil["kapasite"]) {
        $cıktı[]= $i. ". Ağıl: ".$agil["kapasite"]." Koyun<br>";
        $toplamkoyun = $toplamkoyun - $agil["kapasite"];
    }
    else {
        $cıktı[]= $i. ". Ağıl: ".$toplamkoyun." Koyun<br>";
        $toplamkoyun=0;
    }
}

foreach ($cıktı as $sonuc){
    echo $sonuc;
}

echo "<br><br>";



$disardakalan = $agil["toplamkoyun"] - $toplamkapasite;

if(($agil["toplamkoyun"]-($toplamkapasite)) > 0) {
    echo "Dışarıda Kalan: $disardakalan Koyun<br><hr>";
}
else{
    echo "<br><hr>";
}

?>
