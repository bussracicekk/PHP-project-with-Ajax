<?php 
  include('db.php');//database'e bağlantıyı sağlamak için yazılan db.php classının kullanımı
  if (!$conn) {
    die('Connection failed ' . mysqli_error($conn));
  }
  //burda veri ekleme işlemlerini sağladım
  if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $ogrencino = $_POST['ogrencino'];
    $adres = $_POST['adres'];
    $telno = $_POST['telno'];
    $sql = "INSERT INTO ogrenciler (ad_soyad, ogrenci_no,adres,telno) VALUES ('{$name}', '{$ogrencino}','{$adres}','{$telno}')";
    if (mysqli_query($conn, $sql)) {
      $id = mysqli_insert_id($conn);
      $saved_comment = '<div class="index_box">
          <span class="delete" data-id="' . $id . '" >Sil</span>
          <span class="edit" data-id="' . $id . '">Düzenle</span>
          <div class="display_name">'. $name .'</div>
          <div class="ogrencino_text">'. $ogrencino .'</div>
          <div class="adres_text">'. $adres .'</div>
          <div class="telno_text">'. $telno .'</div>
        </div>';
      echo $saved_comment;
    }else {
      echo "Error: ". mysqli_error($conn);
    }
    exit();
  }
  if (isset($_GET['delete'])) {
    $id = $_GET['id'];//silme işlemlerini burda get methodu ile yaptım 
    $sql = "DELETE FROM ogrenciler WHERE id=" . $id;
    mysqli_query($conn, $sql);
    exit();
  }
  if (isset($_POST['update'])) {
    $id = $_POST['id'];//ekleme ve güncelleme işlemlerini ise post methodu ile yaptım
    $name = $_POST['name'];
    $ogrencino = $_POST['ogrencino'];
    $adres = $_POST['adres'];
    $telno = $_POST['telno'];
    $sql = "UPDATE ogrenciler SET ad_soyad='{$name}', ogrenci_no='{$ogrencino}',adres='{$adres}',telno='{$telno}' WHERE id=".$id;
    if (mysqli_query($conn, $sql)) {
      $id = mysqli_insert_id($conn);
      $saved_comment = '<div class="index_box">
        <span class="delete" data-id="' . $id . '" >Sil</span>
        <span class="edit" data-id="' . $id . '">Düzenle</span>
        <div class="display_name">'. $name .'</div>
        <div class="ogrencino_text">'. $ogrencino .'</div>
        <div class="adres_text>'. $adres .'</div>
        <div class="telno_text">'. $telno .'</div>
      </div>';
      echo $saved_comment;
    }else {
      echo "Error: ". mysqli_error($conn);
    }
    exit();
  }

  
  $sql = "SELECT * FROM ogrenciler";
  $result = mysqli_query($conn, $sql);
  $ogrenci = '<div id="display_area">'; 
  while ($row = mysqli_fetch_array($result)) {
    $ogrenci .= '<div class="index_box">
        <span class="delete" data-id="' . $row['id'] . '" >Sil</span>
        <span class="edit" data-id="' . $row['id'] . '">Düzenle</span>
        <div class="display_name">Ad-Soyad:'. $row['ad_soyad'] .'</div>
        <div class="ogrencino_text">'. $row['ogrenci_no'] .'</div>
        <div class="adres_text">'. $row['adres'] .'</div>
        <div class="telno_text">'. $row['telno'] .'</div>
      </div>';
  }
  $ogrenci .= '</div>';
?>