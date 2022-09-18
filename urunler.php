<?php include "header.php"; 
if(isset($_GET['urun_kategori'])){

$urunsor=$db->prepare("SELECT * FROM urunler where urun_kategori=:kategori");
$urunsor->execute(array(
    'kategori' => $_GET['urun_kategori']
));

}

else{

$search = $_POST['a_search'];
$urunsor=$db->prepare("SELECT * FROM urunler where urun_ad LIKE '%$search%'");
$urunsor->execute(array());

}

?>


<div class="container">
		<center><span id="ozelurun"><?php echo $_GET['urun_kategori']; ?></span></center> <br><br><br><br>
		<div class="row">

			 <?php 



			 while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) { ?>
			<div class="col-md-3">
				<div class="urun">
					<div class="urun-res"><img src="admin/<?php echo $uruncek['urun_resim']; ?>" width="260"></div>
					<div class="urun-info"><a href="" class="urun_link"><center>	<?php echo $uruncek['urun_ad']; ?></a><br>
					<b style="position:relative;top:30px"><?php echo $uruncek['urun_fiyat']; ?> ₺</b><br><br><br>
					<small>Stok Durumu: <span style="font-weight: bold;">
						<?php 
							if($uruncek['urun_stok']<1){?>
							<span style="color: red;">Stok Tükendi</span>	
						<?php }else{
echo $uruncek['urun_stok']." Adet";
}
						 ?>





</span></small>
					<br><br>
					<a href="urunbilgi.php?urun_id=<?php echo $uruncek['urun_id']; ?>"><button class="sptekle">SEPETE EKLE</button></a>
					</div></center>
				</div>
			</div>


			<?php } ?>
		
		</div>
	</div>




















<?php include "footer.php"; ?>