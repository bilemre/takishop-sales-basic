<?php 	include "header.php";
 








 ?>
 <div class="container"> 
<center>

    <?php if($_GET['kayit']=="hata"){ ?>
        <div class="alert alert-danger" role="alert">
  Kayıt Olma İşlemi Olmadı. Lütfen Tekrar Deneyiniz..
</div>
<?php } ?>


    <div class="alan"><br><br><br>
        <h3>KAYIT OL</h3><br><br>
        <form action="admin/x/islem.php" method="POST">
        <table>
            <tr>
                <td>
                    <input type="text" name="kullanici_adsoyad" placeholder="Ad Soyad" class="a">
                </td>
            </tr>
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
                  <center>  <button class="btn_giris" name="kayit_ol">KAYIT OL</button></center>
                </td>
            </tr>
        </table></form>
    </div>
</center>
 </div>
<?php   include "footer.php";