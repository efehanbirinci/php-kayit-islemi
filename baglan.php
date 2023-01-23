<?php

try {


    $db= new PDO('mysql:host=localhost;dbname=udemy_kurs;charset=utf8', 'root', '');

   // echo 'Veri Tabanı Bağlantısı Başarılı';




}
catch(PDOException $e)
{

    echo $e->getMessage();




}










?>