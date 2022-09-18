<?php
include "header.php";

$urunsor=$db->prepare("SELECT * FROM urunler order by urun_id DESC");
$urunsor->execute();


?>


<div class="row flex-grow">
    <div class="col-12 grid-margin stretch-card">
        <div class="card card-rounded">

            <div class="card-body">
            <h2>Ürün Listele</h2><br>
  <input class="form-control" id="myInput" type="text" placeholder="Ara">
  <br>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th >Ürün Resim</th>
        <th>Ürün Adı</th>
        <th>Ürün Fiyat</th>
        <th>Ürün Stok</th>
        <th>Ürün Kategori</th>
        <th style="width:40px;">Ürün Öneçıkan</th>
        <th>Ürün Açıklama</th>
        <th></th>
        <th></th>
      </tr>


   

    </thead>
    <tbody id="myTable">
    <?php while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) { ?>
      <tr>
        <td style="width:200px; "><img style="border-radius:10px;"src="<?php echo $uruncek['urun_resim']; ?>" width="200" alt=""></td>
        <td><?php echo $uruncek['urun_ad'] ?></td>
        <td><?php echo $uruncek['urun_fiyat'] ?>₺</td>
        <td><?php echo $uruncek['urun_stok'] ?></td>
        <td><?php echo $uruncek['urun_kategori'] ?></td>
        <td><?php if($uruncek['urun_onecikan']==1){?>
          <button  class="btn btn-success  btn-sm">Aktif</button> 
        <?php
        }
        else{?><button  class="btn btn-danger  btn-sm">Pasif</button>
        <?php }?>
        </td>
        <td style="width:500px;">    <?php echo $uruncek['urun_aciklama'] ?></td>
        <td><a href="urunduzenle.php?urun_id=<?php echo $uruncek['urun_id'];?>"><button type="button" class="btn btn-primary btn-sm">Düzenle</button><a></td>
        <td><a href="x/islem.php?urun_id=<?php echo $uruncek['urun_id']; ?>&urun_sil=ok"><button type="button" class="btn btn-danger btn-sm">Sil</button></a></td>
      </tr>
<?php }?>
      
     
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