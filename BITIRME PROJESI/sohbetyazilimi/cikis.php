<?php
session_start();
error_reporting(0);

// Çıkış işlemi için gerekli kodlar
session_destroy();

// Çıkış işlemi sonrası giriş sayfasına yönlendirme kodu
echo "<script> alert ('Başarılı Bir Şekilde Çıkış Yaptınız.');
        window.location.href='login.php'
        </script>";
?>