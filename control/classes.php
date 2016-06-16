<?php

class Functions
{
  public function loginCheck($db)
  {
   
		$postedUsername = $_POST["email"];// post ile gelen veri
		$postedPassword = $_POST["pass"];// post ile gelen veri
		$query=$db->prepare("SELECT * FROM `usr` WHERE `email` = ? AND `pass` = ?"); // sorguyu oluştur
		$query->execute(array($postedUsername,$postedPassword)); //sorguyu çalıştır
		$result=$query->fetch(); // diziye çevir
		 $no=$query->rowCount(); // dönen veriyi say

		// sorgu çalışmaz ise hata sayfasına yönlendir
	
		if($no==1){
			
			session_start();// session başlat
			$_SESSION['id'] = $result['id']; // atamaları yap
			$_SESSION['Ad'] = $result['ad'].' '.$result['soyad'];
			$_SESSION['yetki'] = $result['yetki'];
			if($_SESSION['yetki'] == '1'){
				 header ("Location:../index.php?page=ana"); 
			}else{
				header ("Location:../system.php?id=1"); 
			}
			
		}else{
			 header ("Location:../index.php?page=ana"); 
		}
		
  }
  
  public function killSession($db)
  {
	  session_start();
	  session_destroy();
	  $_SESSION = NULL;
	  header ("Location:../index.php?page=ana"); 
  }
  public function addKategori($db)
  {	  
	  session_start();
      $query=$db->prepare("INSERT INTO `sub_category` ( `type`, `name`) VALUES (?, ?)"); 
	  $query->execute(array($_POST['type'],$_POST['name'])); //sorguyu çalıştır
	  header ("Location:../system.php?id=2"); 
	
	  
	  
  }
  //----------------------------------------------------------------------------------------------------------
  public function addProducts($db)
  {	 
	  session_start();
      $query=$db->prepare("INSERT INTO `products` ( `name`, `description`, `category_id`,`price`,`dis`) VALUES (?, ?,?,?,?)"); 
	  $query->execute(array($_POST['name'],$_POST['elm1'],$_POST['type'],$_POST['price'],$_POST['dis'])); //sorguyu çalıştır
	
     header ("Location:../system.php?id=4"); 
	  
	  
  }
   public function updatePrd($db)
  {	 
	  session_start();
      $query=$db->prepare("UPDATE `products` SET `name` = ? , `description`=? ,`category_id`=?,`price` = ?,`dis` = ? WHERE id = ?") ; 
	  $query->execute(array($_POST['name'],$_POST['elm1'],$_POST['type'],$_POST['price'],$_POST['dis'],$_POST['id'])); //sorguyu çalıştır
	
     header ("Location:../system.php?id=4"); 
	  
	  
  }
  
  public function deletePrd($db)
  {	  
  
	  $query3=$db->prepare("DELETE FROM `products` WHERE `id` = ? "); 
	  $query3->execute(array($_GET['id'])); //sorguyu çalıştır
	   header ("Location:../system.php?id=4"); 
	  
  }
  public function deleteImage($db)
  {	  
  
	  $query3=$db->prepare("DELETE FROM `pics` WHERE `id` = ? "); 
	  $query3->execute(array($_GET['i'])); //sorguyu çalıştır
	   header ("Location:../system.php?id=7&i=".$_GET['pr']); 
	  
  }
  public function deleteCat($db)
  {	  
  
	  $query3=$db->prepare("DELETE FROM `sub_category` WHERE `id` = ? "); 
	  $query3->execute(array($_GET['id'])); //sorguyu çalıştır
	   header ("Location:../system.php?id=5"); 
	  
  }
  public function addUser($db)
  {	  
      $query=$db->prepare("INSERT INTO `system_usr` ( `Ad`, `Soyad`, `Adres`, `Eposta`, `Sifre`) VALUES ( ?, ?, ?, ?, ?)");
	  $query->execute(array($_POST['y_ad'],$_POST['y_soyad'],$_POST['y_adres'],$_POST['y_mail'],$_POST['y_sifre'])); //sorguyu çalıştır
	  
	  $query2=$db->prepare("SELECT `id` FROM `system_usr` order by `id` desc limit 1 "); 
	  $query2->execute(array("")); //sorguyu çalıştır
	  $result=$query2->fetch();
	  $query3=$db->prepare("INSERT INTO `system_money` (`m_id`, `miktar`) VALUES ( ?, 0) "); 
	  $query3->execute(array($result['id'])); //sorguyu çalıştır
  }
  
  
   
  
  public function addImage($db){
	  
	
		#    RESMIN KONTROL ICIN POST BILGILERI
			$resim         = $_FILES['postedImage']['tmp_name']; 
			$dosya_adi     = $_FILES['postedImage']['name'];
			$dosya_turu = $_FILES['postedImage']['type'];
		#    RESMIN TASIMA VE VERITABANINA YAZILACAK BILGILERI
			$resim_kayit_yolu = "upload";
		#    RESMIN BILGILERI
			$resim_bilgi = getimagesize($resim);
		#    RESMIN ENI
			$resim_bilgi[0];
		#    RESMIN BOYU
			$resim_bilgi[1];

		#    RESMIN UST BILGISI
			$resim_bilgi['mime'];

		$type = explode('/',$dosya_turu);
		$new_name = date('d.m.Y')."-".rand(1,300).".".$type[1];
		/* ALTERNATIF OLARAK */ 
		copy($resim, '../'.$resim_kayit_yolu.'/'.$new_name );
		
		$query3=$db->prepare("INSERT INTO `pics` ( `pr_id`, `url`) VALUES (?,?)"); 
	    $query3->execute(array($_POST['pr_id'],$resim_kayit_yolu.'/'.$new_name)); //sorguyu çalıştır
		
		header ("Location: ../system.php?id=7&i=".$_POST['pr_id']); 
	  
  }
  
}




?>