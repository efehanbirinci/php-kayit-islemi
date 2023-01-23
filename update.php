<?php require_once 'baglan.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <style>
        body:{text-align: center;}


    </style>
	<title>CRUD İŞLEMLERİ</title>
</head>
<body>


	<h1>Veritabanı PDO düzenleme işlemleri</h1>
	<hr>
	<?php 
	if ($_GET['durum']=="ok") {
		
		echo "İşlem başarılı";

	} elseif ($_GET['durum']=="no") {

		echo "İşlem başarısız";


	}

	?>

	<?php 

	$bilgilerimsor=$db->prepare("SELECT * from udemy where ID=:ID");
	$bilgilerimsor->execute(array(
		'ID' => $_GET['ID']
	));

	$bilgilerimcek=$bilgilerimsor->fetch(PDO::FETCH_ASSOC);

	?>

	<form action="islem.php" method="POST">

		<input type="text" required="" name="Ad" value="<?php echo $bilgilerimcek['Ad'] ?>"><br><br>
		<input type="text" required="" name="Soyad" value="<?php echo $bilgilerimcek['Soyad'] ?>"><br><br>
		<input type="email" required="" name="Mail" value="<?php echo $bilgilerimcek['Mail'] ?>"><br><br>
		<input type="text" required="" name="Yas" value="<?php echo $bilgilerimcek['Yas'] ?>"><br><br>

		<input type="hidden" value="<?php echo $bilgilerimcek['ID'] ?>" name="ID">
		<button type="submit" name="updateislemi">Formu Düzenle</button>

	</form>

	<br>







</body>
</html>