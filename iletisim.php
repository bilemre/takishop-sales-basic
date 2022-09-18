<?php include "header.php"; ?>

<div class="container" style="min-height:500px;">
    <?php   if($_GET['durum']=="gonderildi"){ ?>
<div class="alert alert-success" role="alert">
 <center>Bildirim başarı ile gönderildi..</center>
</div>
<?php } ?>
		<center><span id="ozelurun">BİZİMLE İLETİŞİME GEÇİN
</span></center> <br><br><br><br><br>


<b>Adres</b><br>
        <br><p>Sülüntepe, Yunus Emre Cd., 34909 Pendik/İstanbul</p>
        <iframe style="margin-top: 20px;outline:none;border:0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3015.4841668497643!2d29.27555531571653!3d40.905128833714244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cadba9e3791463%3A0x23f17da14a54eebe!2s%C4%B0stanbul%20Gedik%20%C3%9Cniversitesi%20Gedik%20Meslek%20Y%C3%BCksekokulu!5e0!3m2!1str!2str!4v1655626689916!5m2!1str!2str" width="1200" height="450"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  <center>  <br><br><br><br>
    <table><form action="admin/x/islem.php" method="POST">
        <tr>
            <td>Adınız </td>
            <td><input type="text"placeholder="Adınızı Giriniz" required class="iletisimx"></td>
        </tr>
        <tr>
            <td>E Posta Adresiniz </td>
            <td><input type="text"placeholder="E Posta Adresinizi Giriniz" required class="iletisimx"></td>
        </tr>
        <tr>
            <td>Mesaj </td>
            <td><textarea name="" id=""  class="iletisimx xda" required></textarea></td>
        </tr>
        <tr>
            
            <td></td>
            <td ><center><button class="btn_giris"name="igonder">Gönder</button></center></td>
        </tr>
    </table>
</form>





	</div>

</center>


































<?php include "footer.php"; ?>