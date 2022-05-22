<?php include('islem.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
<center><h2>Öğrenci Ekleme-Düzenleme-Silme İşlemleri</h2></center>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div>
  	
  	<form>
      <div>
        <label for="name">Ad Soyad:</label><br/>
      	<input type="text" name="name" id="name">
      </div>
      <div>
      	<label for="ogrencino">Öğrenci No:</label><br/>
      	<input type="number" name="ogrencino" id="ogrencino" cols="30" rows="5">
      </div>
      <div>
        <label for="adres">Adres:</label><br/>
        <textarea name="adres" id="adres" cols="30" rows="5"></textarea>
      </div>
      <div>
        <label for="telno">Telefon Numarası:</label><br/>
        <input type="number" name="telno" id="telno" cols="30" rows="5">
      </div>
      <button type="submit" id="submit_btn">Ekle</button>
      <button type="button" id="update_btn" style="display: none;">Düzenle</button>
  	</form>
  <?php echo $ogrenci; ?>
  </div>
</body>
</html>
<!-- Jquery işlemleri -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="ajax-islem.js"></script>