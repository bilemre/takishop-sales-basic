<?php include "header.php";


$kullanicisor=$db->prepare("SELECT * FROM kullanicilar where kullanici_id=:id");
$kullanicisor->execute(array(
'id' => $_GET['kullanici_id']
));
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

?>

<div class="row flex-grow">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ürün Düzenle</h4>

                <form class="forms-sample" method="POST" action="x/islem.php">
                
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ad Soyad</label>
                        <input type="text" name="kullanici_adsoyad" class="form-control" id="exampleInputEmail1" value="<?php echo $kullanicicek['kullanici_adsoyad']; ?>" placeholder="Ad Soyad">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">E-Posta</label>
                        <input type="email" name="kullanici_mail"  value="<?php echo $kullanicicek['kullanici_mail']; ?>" class="form-control" id="exampleInputPassword1" placeholder="E Posta">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Kullanıcı Yetki</label>
                        <select name="kullanici_yetki" class="form-control" id="exampleInputConfirmPassword1" style="font-weight:bold" ;>
                            <?php if($kullanicicek['kullanici_yetki']==1){ ?>
                            <option value="1">Kullanıcı</option>
                            <option value="2">Yönetici</option>
                        <?php }else{ ?>
                            <option value="2">Yönetici</option>
                            <option value="1">Kullanıcı</option>
                            <?php } ?>
                        </select>
                    </div>
            

                    <input type="hidden" name="k_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
                    <button type="submit" name="kullanici_guncelle" class="btn btn-primary me-2">Kullanıcı Düzenle</button>

                </form>
            </div>
        </div>
    </div>
</div>