<?php include "header.php"; 
$ku_id=$kullanicicek['kullanici_id'];
$sepetsor=$db->prepare("SELECT * FROM sepet where kullanici_id=:id");
$sepetsor->execute(array(
'id'=> $ku_id
));


$sepetsorr=$db->prepare("SELECT * FROM sepet where kullanici_id=:id");
$sepetsorr->execute(array(
'id'=> $ku_id
));
$sepetcekk=$sepetsorr->fetch(PDO::FETCH_ASSOC)

?>

<form action="odeme.php" method="POST"> 

<div class="container" style="min-height:500px;">
<br><br>
<table class="table" style="border-bottom: 3px solid gray;">
  <thead class="thead-dark">
    <tr>
      <th scope="col"></th>
      <th scope="col">Ürün Resim</th>
      <th scope="col">Ürün Adı</th>
      <th scope="col">Ürün Kodu</th>
      <th>Ürün Adet</th>
      <th>Fiyat</th>
    </tr>
  </thead>
  <tbody>
  	<?php while($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)){ 
  		$urunid=$sepetcek['urun_id'];
  		$urunsor=$db->prepare("SELECT * FROM urunler where urun_id=:id");
$urunsor->execute(array(
    'id' => $urunid
));
$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
		 $toplam_fiyat+=$uruncek['urun_fiyat']*$sepetcek['urun_stok'];


	
		$a=$uruncek['urun_fiyat'];
		$b =$sepetcek['urun_stok'];
		$c= $a*$b;

		

  		?>
    <tr>
      <td style="line-height: 65px;"><a href="admin/x/islem.php?sepet_id=<?php echo $sepetcek['sepet_id']; ?>&sepetsil=ok">
        <span style="margin-top: 25px;display: block;height: 25px;line-height: 23px;width:25px;text-align: center;background-color: #4f4f4f;border-radius: 10px;color: white;">x</span>

      </a></td>
      <td><img src="admin/<?php echo $uruncek['urun_resim'] ?>" width="75"></td>
      <td style="line-height: 65px;"><?php echo $uruncek['urun_ad'] ?></td>
      <td style="line-height: 65px;"><center><?php echo $uruncek['urun_id']; ?></center></td>
      <td style="line-height: 65px;"> <center><?php echo $sepetcek['urun_stok']; ?> </center></td>
     <td style="line-height: 65px;">  <center><?php echo $c; ?> ₺</center></td>
    </tr>


    <!--<input type="hidden" name="urun_id[]" value="<?php echo $uruncek['urun_id']; ?>">-->


   <?php  } ?>
  </tbody>
</table>

<div class="SonFiyat"><small><b>Toplam  Fiyat </b> </small> : <?php echo $toplam_fiyat; ?>  ₺<br><br>
<button class="btn_giris">Ödeme Yap</button>
<form>

</div>

</div>








<?php include "footer.php"; ?>

</div>