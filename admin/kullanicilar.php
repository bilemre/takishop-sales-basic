<?php
include "header.php";

$kullanicisor=$db->prepare("SELECT * FROM kullanicilar");
$kullanicisor->execute();

?>


<div class="row flex-grow">
    <div class="col-12 grid-margin stretch-card">
        <div class="card card-rounded">

            <div class="card-body">
            <h2>Kullanıcılar</h2><br>
  <input class="form-control" id="myInput" type="text" placeholder="Ara">
  <br>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Ad Soyad</th>
        <th>E-Posta Adresi</th>
        <th>Üyelik Yetki</th>

        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody id="myTable">
      <?php while($kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC)) { ?>
      <tr>

        <td><?php echo $kullanicicek['kullanici_adsoyad']; ?></td>
        <td><?php echo $kullanicicek['kullanici_mail'] ?></td>
        <td> <?php if($kullanicicek['kullanici_yetki']==1){
          echo "Kullanıcı";
        }
        else{
          echo "Yönetici";
        } ?>
              


        </td>

        <td><a href="kullaniciduzenle.php?kullanici_id=<?php echo $kullanicicek['kullanici_id']; ?>"><button type="button" class="btn btn-primary btn-sm">Düzenle</button></a></td>
        <td><a href="x/islem.php?kullanici_id=<?php echo $kullanicicek['kullanici_id']; ?>&kullanici_sil=ok"><button type="button" class="btn btn-danger btn-sm">Sil</button></a></td>
      </tr>
    <?php } ?>
      
     
    </tbody>
  </table>
  


<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>



            </div>

        </div>
    </div>
</div>

<script>$(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});</script>





<?php include "footer.php";?>