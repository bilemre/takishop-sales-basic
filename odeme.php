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

<form action="admin/x/islem.php" method="POST"> 

<div class="container" style="min-height:500px;">
<br><br>
<table class="table" style="border-bottom: 3px solid gray;">
  <thead class="thead-dark">
    <tr>
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
      
      <td><img src="admin/<?php echo $uruncek['urun_resim'] ?>" width="75"></td>
      <td style="line-height: 65px;"><?php echo $uruncek['urun_ad'] ?></td>
      <td style="line-height: 65px;"><center><?php echo $uruncek['urun_id']; ?></center></td>
      <td style="line-height: 65px;"> <center><?php echo $sepetcek['urun_stok']; ?> </center></td>
     <td style="line-height: 65px;">  <center><?php echo $c; ?> ₺</center></td>
    </tr>
        <input type="hidden" name="kullanici_id" value="<?php  echo $kullanicicek['kullanici_id']; ?> ">
        <input type="hidden" name="urun_idd" value="<?php echo $uruncek['urun_id']; ?>">



   <?php  } ?>
  </tbody>
</table>

<div class="SonFiyat"><small><b>Toplam  Fiyat </b> </small> : <?php echo $toplam_fiyat; ?>  ₺<br>





















<a href="#odemegit" style="text-decoration: none;"><span  style="width: 200px;height: 40px;background-color: black;display: block;line-height: 40px;color:White; cursor: pointer;"> Ödeme Git</span></a>


</div>

</div>





<div style="margin-top:150px;">





  <div class="container" style="min-height:500px;">

    <?php if($_GET['durum']=="basarisiz"){ ?>
        <div class="alert alert-danger" role="alert">
  Lütfen Doğru Kart Bilgilerini Giriniz.. <a href="kart.php">Kart Bilgilerine Eriş</a>
</div>
<?php } ?>

<br>    <br><br>
<center> 
<div class="card-alan" id="odemegit" >
<table> 
    <tr>
        <td><input type="text" name="onalti" class="input_t" max="9999999999999999" placeholder="Kart Numarasını" style="margin-left: -5px;width:250px;margin-top:30px;">
            <input type="number" name="cvv"  class="input_t" max="999" placeholder="CVV" style="width:100px;">
    </td>
    </tr>
    <tr>
        <td><select name="sk11" style="width:50px;text-align:center;height:30px;margin-left:20px;">
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
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
        </select>
        <select name="sk22" style="width:100px;text-align:center;height:30px;margin-left:20px;">
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
            <option value="2027">2027</option>
            <option value="2028">2028</option>
            <option value="2029">2029</option>
            <option value="2030">2030</option>

        </select>
    
    
    </td>
    </tr>
    <tr>







<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id']; ?>">
<input type="hidden" name="kullanici_adres" value="<?php echo $kullanicicek['kullanici_adres']; ?>">
<input type="hidden" name="siparis_toplam" value="<?php echo $toplam_fiyat; ?>">







        <td><center><button class="btn_giris" name="odeme" style="margin-top:20px;">Ödeme Yap</button></center></td>
    </tr>
</table>

</div>   </center>  
  
</form>





</div>

<?php include "footer.php"; ?>

</div>