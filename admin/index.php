<?php
include "header.php";

$ksor=$db->prepare("SELECT * FROM kullanicilar");
$ksor->execute();
$urunsor=$db->prepare("SELECT * FROM urunler ");
$urunsor->execute();
$ocsor=$db->prepare("SELECT * FROM urunler where urun_onecikan=:onecikan");
$ocsor->execute(array(
'onecikan'=>1
));


$ksayi = $ksor->rowCount();
$urunsayi = $urunsor->rowCount();
$onecikan = $ocsor->rowCount();




?>


<div class="row flex-grow">
    <div class="col-12 grid-margin stretch-card">
        <div class="card card-rounded">

            <div class="container-fluid">
                <table style="margin-left:380px;margin-top:20px;">
                    <tr>
                        <td style="position:relative;left:50px;"><i class="mdi mdi-account" style="color:gray;position:relative;top:4px; font-size:25px;"></i> <span style="font-size:20px;color:gray">Toplam Kullanıcı</span>  </td>
                        <td style="position:relative;left:100px;"><i class="mdi mdi-checkbox-marked-circle" style="color:gray;position:relative;top:4px; font-size:25px;"></i> <span style="font-size:20px;color:gray;">Toplam Ürün</span>  </td>
                        <td style="position:relative;left:150px;"><i class="mdi mdi-chart-arc" style="color:gray;position:relative;top:4px; font-size:25px;"></i> <span style="font-size:20px;color:gray;">Öne Çıkan Ürün Sayısı</span>  </td>
                    </tr>
                    <tr>
                        <td><center><b class="count ac" style="position:relative;left:50px;"><?php echo $ksayi; ?></b></center></td>
                        <td><center><b class="count ac" style="position:relative;left:100px;"><?php echo $urunsayi ?></b></center></td>
                        <td><center><b class="count stock" style="position:relative;left:150px;"><?php echo $onecikan  ?></b></center></td>
                    </tr>
                </table>
            </div><br>
<hr>
        </div>
    </div>
</div>







<?php include "footer.php"; ?>