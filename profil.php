<?php include "header.php"; ?>



<?php if(isset($_SESSION['userkullanici_mail'])){
						?>
				

<div class="container" style="min-height: 600px;">
	
	<div class="alabn">
		<center><form action="admin/x/islem.php" method="POST">
		<table>
			<tr>
				<td style="font-size:20px;">Ad Soyad </td>
				<td><input type="text" name="kullanici_adsoyad"value="<?php echo $kullanicicek['kullanici_adsoyad']; ?>"	 class="iayar"></td>
			</tr>
			<tr>
				<td style="font-size:20px">Mail </td>
				<td><input type="email"  disabled class="iayar" value="<?php echo $kullanicicek['kullanici_mail']; ?>"	></td>
			</tr>
			<tr>
				<td style="font-size:20px">Şifre</td>
				<td><input type="password" name="kullanici_sifre" value="<?php echo $kullanicicek['kullanici_sifre']; ?>"	 class="iayar"></td>
			</tr>
			<tr>	<td style="font-size:20px">Adres</td>
				<td><textarea class="aa" name="kullanici_adres"><?php echo $kullanicicek['kullanici_adres']; ?></textarea></td>
			</tr>
			<tr><td></td>
				<td colspan="2"><center> <button class="odeme_button" name="profil_guncelle">Güncelle</button></center></td>
				<input type="hidden" name="kaid"value="<?php echo $kullanicicek['kullanici_id']; ?>">
			</tr></form>
		</table></center>
	</div>





</div>
<?php }else {?><div class="alert alert-info" role="alert">
  Bilgilere Erişmek İçin Lütfen Giriş Yapınız.. 
</div>
<?php } ?>






<?php include "footer.php"; ?>