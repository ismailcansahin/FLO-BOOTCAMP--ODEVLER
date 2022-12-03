<?php
try{
    $baglan = new PDO("mysql:host=localhost;dbname=chat;charset=utf8", "mehmet", "1234");
    $baglan->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $baglan->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}
catch(Exception $e){
    echo $e->getMessage();
}

