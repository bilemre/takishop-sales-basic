<?php include "header.php"; 

$urunsor=$db->prepare("SELECT * FROM urunler where urun_id=:id");
$urunsor->execute(array(
    'id' => $_GET['urun_id']
));
$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
?>


	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<img src="admin/<?php echo $uruncek['urun_resim']; ?>" width="430">
			</div>
			<div class="col-md-7">
					<h3 style="margin-top: 15px;font-size: 21px;font-weight: bold"><?php echo $uruncek['urun_ad']; ?></h3><br>
					<p><?php echo $uruncek['urun_aciklama']; ?></p>
					<br>
					<br>
						<form action="admin/x/islem.php" method="POST">
<b>Fiyat :</b><span style="color: red;font-weight: bold;font-size: 20px;"> 230,00 ₺</span>
					<br><br>
				<b>	Stok Durumu :</b>  <span>
						<?php 
							if($uruncek['urun_stok']<1){?>
							<span style="color: red;">Stok Tükendi</span>	
						<?php }else{
echo $uruncek['urun_stok']." Adet";
}
						 ?>





</span>
					

					<b style="margin-left: 100px;">Adet : </b>	
					<select name="urun_stok" id="" style="width: 50px;height: 30px; outline: none;border: 0;">
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
					<input type="hidden" name="urunid" value="<?php echo $uruncek['urun_id']; ?>">
					<input type="hidden" name="kid" value="<?php echo $kullanicicek['kullanici_id']; ?>">
					<br><br><br><br>


						<?php if(isset($_SESSION['userkullanici_mail'])){
						?>
					<center><button name="sepet_ekle" class="buton1">SEPETE EKLE</button></center>
				<?php }else {?><div class="alert alert-info" role="alert">
  Sepete Eklemek İçin Lütfen Giriş Yapınız.. 
</div>
<?php } ?>
				
</form>





								</div>
		</div>
	</div>























<?php include "footer.php"; ?>