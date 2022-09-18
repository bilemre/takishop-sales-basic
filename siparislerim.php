<?php include "header.php";?>



<div class="container" style="min-height:500px;">
<table class="table" >
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sipariş No</th>
      <th scope="col">Tarih</th>
      <th scope="col">Tutar</th>
      <th>Adres</th>
    </tr>
  </thead>
  <tbody>

<?php 
$kullanici_id = $kullanicicek['kullanici_id'];
$siparissor=$db->prepare("SELECT * FROM siparis where kullanici_id=:id");
$siparissor->execute(array(
'id'=> $kullanici_id
));



$kullanicisorr=$db->prepare("SELECT * FROM kullanicilar where kullanici_mail=:mail");
$kullanicisorr->execute(array(
'mail'=> $_SESSION['userkullanici_mail']
));













while($sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC) and $kullanicicekk=$kullanicisorr->fetch(PDO::FETCH_ASSOC)){?>
    
    <tr >
      <td id="ex"><?php echo $sipariscek['siparis_id']; ?></td>
      <td id="ex"><?php echo $sipariscek['siparis_zaman']; ?></td>
      <td id="ex"><?php echo  $sipariscek['siparis_toplam']; ?> ₺</td>
      <td id="ex"><?php echo $kullanicicekk['kullanici_adres']; ?></td>
    </tr>
   <?php } ?>
   
  </tbody>
</table>
</div>

































<?php include "footer.php";?>