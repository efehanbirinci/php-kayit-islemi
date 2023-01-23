<?php require_once("baglan.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body
        {
            text-align: center;
        }


    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD İŞLEMLERİ</title>
</head>
<body>
    
    <h1>Veritabanı PDO Kayıt İşlemleri</h1>
    <hr>
    <?php 
    if($_GET['durum']=="ok")
    {
        echo 'Kayıt Başarılı <br>';
        
    }
    else if($_GET['durum']=="no")
    {
        echo 'Kayıt Başarısız';
        echo '<br>';
    }
    
    ?>
    <form action="islem.php" method="POST">
    <input type="text" required="" name='Ad' placeholder="Adınızı Giriniz"><br><br>
    <input type="text" required="" name="Soyad" placeholder="Soyadınızı Giriniz"><br><br>
    <input type="text" required="" name="Mail" placeholder="Mailinizi Giriniz"><br><br>
    <input type="text" required="" name="Yas" placeholder="Yaşınızı Giriniz"><br><br>
    <button type="submit" name='insertislemi'>Formu Gönder</button>
    </form>
    
    <br>
    <?php 
    $bilgilerimsor=$db->prepare("SELECT* from udemy");
    $bilgilerimsor->execute();
    $say = 0;

    while($bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC)) {?>
    <hr>
    <?php $say++ ?>
<table border="1" width=60%>
    <tr>
        <th width="100">Sıra No</th>
        <th>ID</th>
        <th>Ad</th>
        <th>Soyad</th>
        <th width="400">Mail</th>
        <th>Yas</th>
        <th width="50">İşlemler</th>
        <th width="50">İşlemler</th>
    </tr>
    <tr>
        <td><?php echo $say ?></td>
        <td><?php echo $bilgilerimcek['ID'] ?></td>
        <td><?php echo $bilgilerimcek['Ad'] ?></td>
        <td><?php echo $bilgilerimcek['Soyad'] ?></td>
        <td><?php echo $bilgilerimcek['Mail'] ?></td>
        <td><?php echo $bilgilerimcek['Yas'] ?></td>
        <td align="center"><a href="update.php?ID=<?php echo $bilgilerimcek['ID']?>"><button>Düzenle</button></a></td>
        <td align="center"><a href="islem.php?ID=<?php echo $bilgilerimcek['ID']?>&silmeislemi=ok"><button>Sil</button></a></td>
    </tr>
    <?php } ?>
</table>

    <br>

    

</body>
</html>