$(document).ready(function(){
  $(document).on('click', '#submit_btn', function(){
    //Ekle butonuna tıklandığında bu kısım çalışarak sayfa yenilemeden database'e veri ekleme işlemi yapılır.
    var name = $('#name').val();
    var ogrencino = $('#ogrencino').val();
    var adres = $('#adres').val();
    var telno = $('#telno').val();
    $.ajax({
      url: 'islem.php',
      //Bu kısım islem.php classından beslenir.
      type: 'POST',
      //Veri ekleme işlemi bir POST işlemidir.
      data: {
        'save': 1,
        'name': name,
        'ogrencino': ogrencino,
        'adres': adres,
        'telno': telno
      },
      //ogrenciler tablosuna ad_soyad,ogrenci_no,adres ve telno verileri eklenir.
      success: function(response){
        $('#name').val('');
        $('#ogrencino').val('');
        $('#adres').val('');
        $('#telno').val('');
        $('#display_area').append(response);
      }
    });
  });
  $(document).on('click', '.delete', function(){
    //Sil butonuna tıklandığında database'den ilgili veriyi silme işlemi yapılır.
    var id = $(this).data('id');
    $clicked_btn = $(this);
    $.ajax({
      url: 'islem.php',
      type: 'GET',
      //Silme işlemi bir GET işlemidir.
      data: {
      'delete': 1,
      'id': id,
      },
      success: function(response){
        // silinen veri kaldırılır.
        $clicked_btn.parent().remove();
        $('#name').val('');
        $('#ogrencino').val('');
        $('#adres').val('');
        $('#telno').val('');
      }
    });
  });
  var edit_id;
  var $edit_comment;
  $(document).on('click', '.edit', function(){
    //düzenle butonuna tıklandığında, ilgili veriler formda görünür ve düzenlenebilir.
    edit_id = $(this).data('id');
    $edit_comment = $(this).parent();
    var name = $(this).siblings('.display_name').text();
    var ogrencino = $(this).siblings('.ogrencino_text').text();
    var adres = $(this).siblings('.adres_text').text();
    var telno = $(this).siblings('.telno_text').text();
    $('#name').val(name);
    $('#ogrencino').val(ogrencino);
    $('#adres').val(adres);
    $('#telno').val(telno);
    $('#submit_btn').hide();
    $('#update_btn').show();
  });
  $(document).on('click', '#update_btn', function(){
    //veriler düzenlendikten sonra Düzenle butonuna tıklanarak ilgili veri güncellenir.
    var id = edit_id;
    var name = $('#name').val();
    var ogrencino = $('#ogrencino').val();
    var adres = $('#adres').val();
    var telno = $('#telno').val();
    $.ajax({
      url: 'islem.php',
      type: 'POST',
      data: {
        'update': 1,
        'id': id,
        'name': name,
        'ogrencino': ogrencino,
        'adres': adres,
        'telno': telno,
      },
      success: function(response){
        $('#name').val('');
        $('#ogrencino').val('');
        $('#adres').val('');
        $('#telno').val('');
        $('#submit_btn').show();
        $('#update_btn').hide();
        $edit_comment.replaceWith(response);
      }
    });   
  });
});