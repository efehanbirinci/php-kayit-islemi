<?php

require_once 'baglan.php';

if (isset($_POST['insertislemi'])) {

    $kaydet = $db->prepare("INSERT into udemy set
        Ad=:Ad,
        Soyad=:Soyad,
        Mail=:Mail,
        Yas=:Yas
        ");

    $insert = $kaydet->execute(
        array(

            'Ad' => $_POST['Ad'],
            'Soyad' => $_POST['Soyad'],
            'Mail' => $_POST['Mail'],
            'Yas' => $_POST['Yas']

        )
    );




    if ($insert) {
        // echo 'Kayıt Başarılı';
        header("Location:crud-islemleri.php?durum=ok");
        exit;
    } else {
        header("Location:crud-islemleri.php?durum=no");
        exit;
    }
}

if (isset($_POST['updateislemi'])) {
    $ID = $_POST['ID'];
    $guncelle = $db->prepare("UPDATE udemy set
        Ad=:Ad,
        Soyad=:Soyad,
        Mail=:Mail,
        Yas=:Yas
        where ID={$_POST['ID']}
        ");

    $update = $guncelle->execute(
        array(

            'Ad' => $_POST['Ad'],
            'Soyad' => $_POST['Soyad'],
            'Mail' => $_POST['Mail'],
            'Yas' => $_POST['Yas']

        )
    );




    if ($update) {
        echo 'İşlem Başarılı';
        header("Location:crud-islemleri?durum.php");
        exit;
    } else {
        echo 'İşlem Başarısız';
        header("Location:update.php?durum=ok&$ID=$ID");
        exit;
    }

}
if ($_GET['silmeislemi']=="ok"){

    $sil=$db->prepare("DELETE from udemy where ID=:ID");
    $kontrol = $sil->execute(
        array(
            'ID' => $_GET['ID']

        )
    );
    if ($kontrol) {
        echo 'Silme İşlemi Başarılı';
        header("Location:crud-islemleri.php?durum=ok");
        exit;
    } else {
        header("Location:crud-islemleri.php?durum=no");
        exit;
    }
}



?>