<?php
$agil = array (
    "sayi" => 5 ,
    "kapasite" => 30 ,
    "toplamkoyun" => 73
);

echo "Toplam Ağıl: " . $agil["sayi"] . "<br>";
echo "Toplam Kapasite: " . $agil["kapasite"]*$agil["sayi"]. "<br>";
echo "Toplam Koyun: " . $agil["toplamkoyun"] . "<br><br>";


for($i=$agil["sayi"]; $i >= 1; $i--) {
    if($agil["toplamkoyun"] >= $agil["kapasite"]) {
        $cıktı[]= $i. ". Ağıl: ".$agil["kapasite"]." Koyun<br>";
        $agil["toplamkoyun"]=$agil["toplamkoyun"]-$agil["kapasite"];
    }
    else {
        $cıktı[]= $i. ". Ağıl: ".$agil["toplamkoyun"]." Koyun<br>";
        $agil["toplamkoyun"]=0;
    }
}

foreach ($cıktı as $sonuc){
    echo $sonuc;
}

echo "<br><br>";

$toplamkapasite = $agil["kapasite"]*3;

if(($agil["toplamkoyun"]-($toplamkapasite)) > 0) {
    echo "Dışarda Kalan: ".($agil["toplamkoyun"] - $toplamkapasite)."Koyun";
}
else{
    echo "";
}

?>