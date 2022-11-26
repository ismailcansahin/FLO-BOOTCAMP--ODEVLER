<?php
require_once 'baglan.php';
$baglan = baglan();


$adsoyad = $_POST["adsoyad"];

if(is_numeric($_POST["tckimlik"]) == TRUE){
    $tckimlik = $_POST["tckimlik"];}

else{
    echo "<script>
    alert('HATA: T.C Kimlik Numaranız Sadece 11 Adet Rakam İçermelidir.');
    window.top.location = 'form.php';
    </script>";
    die();
}

    
$tc  = array_map('intval', str_split($tckimlik));


class Kayıt {
    private $toplam1;
    private $toplam2;
        
    public function __construct($veri2){
        $this->durum = $veri2;
        $this->toplam1 = (((($veri2[0]+$veri2[2]+$veri2[4]+$veri2[6]+$veri2[8])*7)-($veri2[1]+$veri2[3]+$veri2[5]+$veri2[7]))%10);
        $this->toplam2 = (($veri2[0]+$veri2[1]+$veri2[2]+$veri2[3]+$veri2[4]+$veri2[5]+$veri2[6]+$veri2[7]+$veri2[8]+$veri2[9])%10);
    }   
    
    public function islem() {
        if(count($this->durum) != 11) {
            return $veri3 = "T.C Kimlik Numarası GEÇERSİZ";
        }
        else if($this->durum[0] == 0) {
            return $veri3 = "T.C Kimlik Numarası GEÇERSİZ";
        }
        else if($this->toplam1  != $this->durum[9]) {
            return $veri3 = "T.C Kimlik Numarası GEÇERSİZ";
        }
        else if($this->toplam2  != $this->durum[10]) {
            return $veri3 = "T.C Kimlik Numarası GEÇERSİZ";
        }
        else{
            return $veri3 = "T.C Kimlik Numarası GEÇERLİ"; 
        }
    }

}   

    $icerik =new Kayıt($tc);
    $durum2 =(string)$icerik->islem();

    $sorgu = $baglan->prepare("insert into form values (?,?,?,?)");
    $ekle = $sorgu->execute(array(NULL, $adsoyad, $tckimlik, $durum2));
    $sorgu->closeCursor(); unset($sorgu);
    echo "<script>window.location.href='form.php';</script>";


?>

