<?php include "header.php"; ?>



<?php echo $_POST['spet_add']; ?>
<div class="container" style="min-height:608px;"><center>
   <br><br> <table><form action="odeme.php" method="POST">
	 <h2>Adres Seçimi</h2><br>
        <tr>
            <td><input type="text" name="adsoyad" class="input_t" placeholder="Ad Soyad" value="<?php echo $kullanicicek['kullanici_adsoyad']; ?>"></td>
        </tr>
        <tr>
            <td><input type="text" name="ulke"  class="input_t" placeholder="Ülke"></td>
        </tr>

        <tr>
            <td><input type="text" name="il" class="input_t" placeholder="İl"></td>
        </tr>
        <tr>
            <td><input type="text" name="ilce" class="input_t"placeholder="İlçe"></td>
        </tr>
        <tr>
            <td><input type="text" name="semt" class="input_t"placeholder="Semt"></td>
        </tr>
        <tr>
            <td><input type="text" name="sokak" class="input_t"placeholder="Sokak"></td>
        </tr>
        <tr>
 
            <td><input type="text" name="binano" class="input_t aaa"placeholder="Bina No">
<input type="text" class="input_t aaa" name="daireno"placeholder="Daire No">
            </td>

        </tr>
        <tr>
        	<td><textarea class="input_t bb" name="tamadres" placeholder="Tam Adres Giriniz"></textarea></td>
        </tr>
        <tr>
        	<td><center><br><button class="btn_giris">Ödemeye Git</button></center></td>
        </tr>
    </table></form>
    </center>


</div>








































<?php include "footer.php"; ?>

