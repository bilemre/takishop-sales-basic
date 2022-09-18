<?php include "header.php"; 
$urunsor=$db->prepare("SELECT * FROM urunler where urun_id=:id");
$urunsor->execute(array(
    'id' => $_GET['urun_id']
));
$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

?>

<div class="row flex-grow">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ürün Düzenle</h4>

                
                    <div class="form-group">
                        <label for="exampleInputUsername1">Ürün Resim</label><br>
                        <img style="border-radius: 10px;"src="<?php echo $uruncek['urun_resim']; ?>" width="200">
                    </div>
                       
                    <form class="forms-sample" method="post" action="x/islem.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ürün Adı</label>
                        <input type="text" class="form-control"name="urun_ad" id="exampleInputEmail1" value="<?php echo $uruncek['urun_ad'] ?>" placeholder="Ürün Adı">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ürün Fiyat</label>
                        <input type="number"name="urun_fiyat" max="1500" class="form-control" id="exampleInputPassword1"value="<?php echo $uruncek['urun_fiyat'] ?>" placeholder="Ürün Fiyat">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Ürün Stok</label>
                        <select name="urun_stok" class="form-control" id="exampleInputConfirmPassword1" style="font-weight:bold" ;>
                            <?php if($uruncek['urun_stok']==1){ ?>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        <?php }else if($uruncek['urun_stok']==2) {?>

                            <option value="2">2</option>
                            <option value="1">1</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                           <?php }else if($uruncek['urun_stok']==3){ ?>


                            <option value="3">3</option>
                             <option value="2">2</option>
                            <option value="1">1</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        <?php }else if($uruncek['urun_stok']==4){ ?>

                            <option value="4">4</option>
                            <option value="3">3</option>
                             <option value="2">2</option>
                            <option value="1">1</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        <?php }else if($uruncek['urun_stok']==5){ ?>

                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                             <option value="2">2</option>
                            <option value="1">1</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>

                        <?php }else if($uruncek['urun_stok']==6){ ?>

                            <option value="6">6</option>
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                             <option value="2">2</option>
                            <option value="1">1</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        <?php }else if($uruncek['urun_stok']==7) {?>

                             
                            <option value="7">7</option>
                              <option value="6">6</option>
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                             <option value="2">2</option>
                            <option value="1">1</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        <?php }else if($uruncek['urun_stok']==8){ ?>


                            <option value="8">8</option>
                            <option value="7">7</option>
                              <option value="6">6</option>
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                             <option value="2">2</option>
                            <option value="1">1</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        <?php }else if($uruncek['urun_stok']==9){ ?>

                            <option value="9">9</option>
                             <option value="8">8</option>
                            <option value="7">7</option>
                              <option value="6">6</option>
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                             <option value="2">2</option>
                            <option value="1">1</option>
                            <option value="10">10</option>
                        <?php }else{ ?>
<option value="10">10</option>
  <option value="9">9</option>
                             <option value="8">8</option>
                            <option value="7">7</option>
                              <option value="6">6</option>
                            <option value="5">5</option>
                            <option value="4">4</option>
                            <option value="3">3</option>
                             <option value="2">2</option>
                            <option value="1">1</option>
                            
                        <?php } ?>





                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Ürün Kategori</label>
                        <select name="urun_kategori" class="form-control" id="exampleInputConfirmPassword1" style="font-weight:bold" ;>


                              <?php if($uruncek['urun_kategori']=="kolye"){?>


                            
                            <option value="kolye">Kolye</option>
                            <option value="yüzük">Yüzük</option>
                            <option value="küpe">Küpe</option>
                            <option value="bileklik">Bileklik</option>
                            <option value="takı seti">Takı Seti</option>
                            <option value="hızma">Hızma</option>
                        <?php }else if($uruncek['urun_kategori']=="yüzük"){ ?>


                            <option value="yüzük">Yüzük</option>
                            <option value="kolye">Kolye</option>
                            <option value="küpe">Küpe</option>
                            <option value="bileklik">Bileklik</option>
                            <option value="takı seti">Takı Seti</option>
                            <option value="hızma">Hızma</option>

                        <?php }else if($uruncek['urun_kategori']=="küpe"){ ?>

                            <option value="küpe">Küpe</option>
                             <option value="yüzük">Yüzük</option>
                            <option value="kolye">Kolye</option>
                            <option value="bileklik">Bileklik</option>
                            <option value="takı seti">Takı Seti</option>
                            <option value="hızma">Hızma</option>
                        <?php }else if($uruncek['urun_kategori']=="bileklik"){ ?>

                            <option value="bileklik">Bileklik</option>
                             <option value="küpe">Küpe</option>
                             <option value="yüzük">Yüzük</option>
                            <option value="kolye">Kolye</option>
                            <option value="takı seti">Takı Seti</option>
                            <option value="hızma">Hızma</option>

                        <?php }else if($uruncek['urun_kategori']=="takı seti") {?>


                            <option value="takı seti">Takı Seti</option>
                            <option value="küpe">Küpe</option>
                             <option value="yüzük">Yüzük</option>
                            <option value="kolye">Kolye</option>
                            <option value="bileklik">Bileklik</option>
                            <option value="hızma">Hızma</option>

                        <?php }else if($uruncek['urun_kategori']=="hızma"){ ?>
                             <option value="hızma">Hızma</option>
  <option value="takı seti">Takı Seti</option>
                            <option value="küpe">Küpe</option>
                             <option value="yüzük">Yüzük</option>
                            <option value="kolye">Kolye</option>
                            <option value="bileklik">Bileklik</option>
                           


                        <?php } ?>




                        </select>
                    </div> <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Ürün Öneçıkan</label>
                        <select name="urun_onecikan" class="form-control" id="exampleInputConfirmPassword1" style="font-weight:bold" ;>
                        <?php 
                            if($uruncek['urun_onecikan']==1){ ?>
                            <option value="1">Aktif</option>
                        <option value="2">Pasif</option><?php }else{?>
                            <option value="2">Pasif</option>
                            +<option value="1">Aktif</option>
<?php }?>   
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Ürün Açıklama</label>
                        <textarea name="urun_aciklama"><?php echo $uruncek['urun_aciklama']; ?></textarea>
                <script>
                        CKEDITOR.replace( 'urun_aciklama' );
                </script>
                    </div>

                    <div class="form-check form-check-flat form-check-primary">

                    </div>
                    <button type="submit" name="urun_guncelle" class="btn btn-primary me-2">Ürün Düzenle</button>
                    <br><br><br><input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id']; ?>">
                </form>
            </div>
        </div>
    </div>
</div>