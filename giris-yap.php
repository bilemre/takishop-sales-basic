<?php 	include "header.php";
 








 ?>
 <div class="container"> 
<center>

    <?php if($_GET['kayit']=="basarili"){ ?>
<div class="alert alert-success" role="alert">
Kayıt olma işlemi tamamlandı. Lütfen Giriş Yapınız..
</div>
<?php } else if($_GET['durum']=="no"){?>
    <div class="alert alert-danger" role="alert">
Kullanıcı adı ve şifre hatalı. Lütfen tekrar deneyiniz..
</div><?php }else if($_GET['durum']=="exit"){ ?>
    <div class="alert alert-primary" role="alert">
 Başarı ile çıkış yapıldı.
</div>
<?php } ?>

    <div class="alan"><br><br><br>
        <h3>GİRİŞ YAP</h3><br><br>
        <table><form action="admin/x/islem.php" method="POST">
            <tr>
                <td>
                    <input type="email" name="kullanici_mail" placeholder="E-mail giriniz" class="a">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="password" name="kullanici_sifre" placeholder="Şifre giriniz" class="a" >
                </td>
            </tr>
            <tr>
                <td>
                  <center>  <button class="btn_giris" name="giris_yap">GİRİŞ YAP</button></center>
                </td>
            </tr>
        </table></form>
    </div>
</center>
 </div>
<?php   include "footer.php";