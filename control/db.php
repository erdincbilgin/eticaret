<?php
$host = 'MYSQL5017.myWindowsHosting.com';
$dbname = 'db_9fd57c_test';
$login = '9fd57c_test';
$passwd = 'merhaba123';
if(isset($_SESSION['id'])){
	
		try{
		$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8","$login","$passwd");
		$query=$db->prepare("select * from `system_user` where id=?"); // sorguyu oluştur
		 $query->execute(array($_SESSION['id'])); //sorguyu çalıştır
		 $result=$query->fetch();
		 
		
		
		 
		 
	}catch(PDOException $hata){
		//echo $hata->getMessage();
		echo '<center><h3 style="margin:200px">SİSTEMİMİZ GÜNCELLENMEKTEDİR.EN KISA SÜREDE TEKRAR HİZMETE AÇILACAKTIR</h3></center>';
		exit();
	}
	
	
	
	
}else{
		
		try{
			 	
			$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8","$login","$passwd");
			 
		}catch(PDOException $hata){
			//echo $hata->getMessage();
			echo '<center><h3 style="margin:200px">SİSTEMİMİZ GÜNCELLENMEKTEDİR.EN KISA SÜREDE TEKRAR HİZMETE AÇILACAKTIR</h3></center>';
			exit();
		}
}		
		
   
?>