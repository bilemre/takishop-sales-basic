<?php include "header.php"; ?>

<div class="row flex-grow">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ürün Ekle</h4>

                <form class="forms-sample" enctype="multipart/form-data" method="POST" action="x/islem.php">
                    <div class="form-group">
                        <label for="exampleInputUsername1">Ürün Resim</label>
                        <input type="file" name="urun_resim" style="height:40px;" class="form-control" id="exampleInputUsername1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ürün Adı</label>
                        <input type="text" name="urun_ad" class="form-control" id="exampleInputEmail1" placeholder="Ürün Adı">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Ürün Fiyat</label>
                        <input type="number" name="urun_fiyat" max="1500" class="form-control" id="exampleInputPassword1" placeholder="Ürün Fiyat">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Ürün Stok</label>
                        <select name="urun_stok" class="form-control" id="exampleInputConfirmPassword1" style="font-weight:bold" ;>
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
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Ürün Kategori</label>
                        <select name="urun_kategori" class="form-control" id="exampleInputConfirmPassword1" style="font-weight:bold" ;>
                            <option value="yüzük">Yüzük</option>
                            <option value="kolye">Kolye</option>
                            <option value="küpe">Küpe</option>
                            <option value="bileklik">Bileklik</option>
                            <option value="takı seti">Takı Seti</option>
                            <option value="hızma">Hızma</option>
                        </select>
                    </div> <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Ürün Öneçıkan</label>
                        <select name="urun_onecikan" class="form-control" id="exampleInputConfirmPassword1" style="font-weight:bold" ;>
                            <option value="1">Aktif</option>
                            <option value="2">Pasif</option>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Ürün Açıklama</label>
                        <textarea name="urun_aciklama"></textarea>
                <script>
                        CKEDITOR.replace( 'urun_aciklama' );
                </script>
                    </div>

                    <div class="form-check form-check-flat form-check-primary">

                    </div>
                    <button type="submit" name="urun_ekle" class="btn btn-primary me-2">Ürün Ekle</button>

                </form>
            </div>
        </div>
    </div>
</div>