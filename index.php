<?php include "header.php"; 
$urunsor=$db->prepare("SELECT * FROM urunler where urun_onecikan=:onecikan");
$urunsor->execute(array(
    'onecikan' => 1
));
?>







	
	<div class="container-fluid">
		<div id="demo" class="carousel slide" data-ride="carousel">

			<!-- Indicators -->
			<ul class="carousel-indicators">
				<li data-target="#demo" data-slide-to="0" class="active"></li>
				<li data-target="#demo" data-slide-to="1"></li>

			</ul>

			<!-- The slideshow -->
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="img/a.png" alt="Los Angeles" width="1100" height="500">
				</div>
				<div class="carousel-item">
					<img src="img/slider2.jpg" alt="Chicago" width="1100" height="500">
				</div>

			</div>

			<!-- Left and right controls -->
			<a class="carousel-control-prev" href="#demo" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			</a>
			<a class="carousel-control-next" href="#demo" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			</a>
		</div>
	</div><br><br>
	<div class="container">
		<center><span id="ozelurun">Özel Ürünler</span></center> <br><br><br><br>
		<div class="row">
			
			  <?php while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) { ?>

			<div class="col-md-3">
				<div class="urun">
					<div class="urun-res"><img src="admin/<?php echo $uruncek['urun_resim'];  ?>" width="260"></div>
					<div class="urun-info"><a href="urunbilgi.php?urun_id=<?php echo $uruncek['urun_id']; ?>" class="urun_link"><center><?php echo $uruncek['urun_ad'];  ?></a><br>
					<b style="position:relative;top:30px"><?php echo $uruncek['urun_fiyat'];  ?> ₺</b><br><br><br>



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