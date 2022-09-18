


 <?php 


try{
		        $db = new PDO('mysql:host=localhost;dbname=takishop;charset=utf8','root','12345678');
		        //echo "başarılı";
			}catch(PDOException $e){
				echo 'Hata: '.$e->getMessage();
			}
			
  ?>