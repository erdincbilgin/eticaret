<?php 
session_start();
if($_SESSION['yetki'] != '10'){
 header ("Location:../index.php"); 
}
include 'control/db.php';
	?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

 <!-- BEGIN HEAD -->
<head>
     <meta charset="UTF-8" />
    <title>FIRSATI YAKALA</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
	      <link rel="stylesheet" href="asset/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="asset/css/main.css" />
    <link rel="stylesheet" href="asset/css/theme.css" />
    <link rel="stylesheet" href="asset/css/MoneAdmin.css" />
    <link rel="stylesheet" href="asset/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link rel="stylesheet" href="asset/plugins/Font-Awesome/css/font-awesome.css" />
     <link rel="stylesheet" href="asset/plugins/wysihtml5/dist/bootstrap-wysihtml5-0.0.2.css" />
    <link rel="stylesheet" href="asset/css/Markdown.Editor.hack.css" />
    <link rel="stylesheet" href="asset/plugins/CLEditor1_4_3/jquery.cleditor.css" />
    <link rel="stylesheet" href="asset/css/jquery.cleditor-hack.css" />
    <link rel="stylesheet" href="asset/css/bootstrap-wysihtml5-hack.css" />
     <style>
                        ul.wysihtml5-toolbar > li {
                            position: relative;
                        }
                    </style>
    <!-- GLOBAL STYLES -->

    <link rel="stylesheet" href="asset/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="asset/css/main.css" />
    <link rel="stylesheet" href="asset/css/theme.css" />
    <link rel="stylesheet" href="asset/css/MoneAdmin.css" />
    <link rel="stylesheet" href="asset/plugins/Font-Awesome/css/font-awesome.css" />
    <!--END GLOBAL STYLES -->

    <!-- PAGE LEVEL STYLES -->
    <link href="asset/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- END PAGE LEVEL  STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
     <!-- END HEAD -->
     <!-- BEGIN BODY -->
<body class="padTop53 " >

     <!-- MAIN WRAPPER -->
    <div id="wrap">


         <!-- HEADER SECTION -->
        <div id="top">

            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">

                    
                </header>
                <!-- END LOGO SECTION -->
                <ul class="nav navbar-top-links navbar-right">

                  

                   


                    <!--ADMIN SETTINGS SECTIONS -->

                    <a href="control/functions.php?prs=killSession"><i class="icon-signout"></i> Çıkış Yap </a>
                    <!--END ADMIN SETTINGS -->
                </ul>

            </nav>

        </div>
        <!-- END HEADER SECTION -->



        <!-- MENU SECTION -->
       <div id="left">
           

            <ul id="menu" class="collapse">

                
                <li class="panel">
                    <a href="system.php?id=2" >
                        <i class="icon-table"></i> Ürün Ekle
	   
                       
                    </a>                   
                </li>
				<li class="panel">
                    <a href="system.php?id=1" >
                        <i class="icon-table"></i> Kategori Ekle
	   
                       
                    </a>                   
                </li>
				<li class="panel">
                    <a href="system.php?id=4" >
                        <i class="icon-table"></i> Ürünler
	   
                       
                    </a>                   
                </li>
				<li class="panel">
                    <a href="system.php?id=5" >
                        <i class="icon-table"></i> Kategoriler
	   
                       
                    </a>                   
                </li>



               

            </ul>

        </div>
        <!--END MENU SECTION -->


        <!--PAGE CONTENT -->
        <div id="content">

            <div class="inner">
				<?php if($_GET['id'] == 1){ ?> 
                <div class="widget">
                <h4 class="widgettitle">KATEGORİ EKLEME PANELİ</h4>
                <div class="widgetcontent">
				<form method="post" action="control/functions.php?prs=addKategori" >
                    <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">KATEGORİ ADI</label>
                        <input type="text" class="form-control input-default" name="name">
                    </div>
				<select name="type"  class="form-control input-default"> 
				  <?php
				   $query=$db->prepare("SELECT * FROM `main_cat`"); // sorguyu oluştur
				   $query->execute(array("")); //sorguyu çalıştır
				   $result=$query->fetchAll(); // diziye çevir
				   $query->closeCursor();
					 foreach($result as $category){
				  ?>
				  <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
					 <?php } ?>
				</select>
					
				<button style="margin-top:50px" type="submit" class="btn btn-primary">Kategori Ekle</button>
				</form>
                </div><!-- widgetcontent-->
            </div><!-- widget-->
			<?php }else if($_GET['id'] == '4'){ ?>


                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                             <th class="head0">ÜRÜN ADI</th>
							
											<th class="head1">FİYAT</th>
											 <th class="head1">SİL</th>
											<th class="head0">GÜNCELLE</th>
											 <th class="head1">RESİMLER</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php $stmt=$db->prepare("SELECT * FROM `products`order by category_id "); 
											$stmt->execute(array("")); //sorguyu çalıştır
											$prds=$stmt->fetchAll();
											$stmt->closeCursor();
											foreach($prds as $pr){    ?>
										<tr class="gradeX">
										 
											<td><?php echo $pr['name'] ?></td>
											<td><?php echo $pr['price'] ?></td>
											<td><a href="control/functions.php?prs=deletePrd&id=<?php echo $pr['id'] ?>">SİL</a></td>
											<td class="center"><a href="system.php?id=9&i=<?php echo $pr['id'] ?>">GÜNCELLE</a></td>
											<td class="center"><a href="system.php?id=7&i=<?php echo $pr['id'] ?>">GALERİ</a></td>
										   
										</tr>
											<?php  } ?>
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
			
			<?php  }else if($_GET['id'] == '2'){ ?>
			<form method="post" action="control/functions.php?prs=addProducts" >
			
                        <div class="col-lg-12">
                            <div class="box">
                                
                                <div id="div-1" class="body collapse in">
                                   
                                        <textarea name="elm1" id="wysihtml5" class="form-control" rows="10"></textarea>

                                 
                                </div>
                            </div>
                        </div>
                   
			
			  <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Ürün Başlığı</label>
                        <input type="text" class="form-control input-default" name="name">
              </div>
			   <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Fiyat</label>
                        <input type="number" class="form-control input-default" name="price">
              </div>
			  <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">İndirim</label>
                        <input type="number" class="form-control input-default" name="dis">
              </div>
				<select name="type"  class="form-control input-default"> 
				  <?php
				   $query=$db->prepare("SELECT * FROM `sub_category` order by name"); // sorguyu oluştur
				   $query->execute(array("")); //sorguyu çalıştır
				   $result=$query->fetchAll(); // diziye çevir
				   $query->closeCursor();
					 foreach($result as $category){
				  ?>
				  <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
					 <?php } ?>
				</select>
            <br/>
           <div class="form-actions">
                                            <br />
                                            <input type="submit" value="EKLE" class="btn btn-primary" />
                                        </div>
          </form>
			<?php }else if($_GET['id'] == 9){
			$query=$db->prepare("SELECT * FROM `products` where id = ?"); // sorguyu oluştur
			$query->execute(array($_GET['i'])); //sorguyu çalıştır
		    $prds=$query->fetch(); // diziye çevir
		    $query->closeCursor();
			?>
			
		
			<form method="post" action="control/functions.php?prs=updatePrd" >
			<div>
                 <textarea name="elm1" id="wysihtml5" class="form-control" rows="10">
				<?php echo $prds['description'] ?>
                </textarea>
            </div>
			  <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Ürün Başlığı</label>
                        <input type="text" value="<?php echo $prds['name'] ?>" class="form-control input-default" name="name">
              </div>
			   <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">Fiyat</label>
                        <input type="number" value="<?php echo $prds['price'] ?>" class="form-control input-default" name="price">
              </div>
			  <div class="form-group has-success">
                        <label class="control-label" for="inputSuccess">İndirim</label>
                        <input type="number" value="<?php echo $prds['dis'] ?>" class="form-control input-default" name="dis">
						<input type="hidden" value="<?php echo $prds['id'] ?>" class="form-control input-default" name="id">
              </div>
				<select name="type"  class="form-control input-default"> 
				  <?php
				   $query=$db->prepare("SELECT * FROM `sub_category` where id = ?"); // sorguyu oluştur
				   $query->execute(array($prds['category_id'])); //sorguyu çalıştır
				   $r=$query->fetch(); // diziye çevir
				   $query->closeCursor();
				   ?> <option value="<?php echo $r['id'] ?>"><?php echo $r['name'] ?></option>  <?php
				   $query=$db->prepare("SELECT * FROM `sub_category` where id != ? order by name"); // sorguyu oluştur
				   $query->execute(array($r['id'])); //sorguyu çalıştır
				   $result=$query->fetchAll(); // diziye çevir
				   $query->closeCursor();
					 foreach($result as $category){
				  ?>
				  <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
					 <?php } ?>
				</select>
            <br/>
            <button type="submit" name="submit" class="btn btn-primary">Ürünü Güncelle</button>
          </form>
			
		    <?php } else if($_GET['id'] == 5){ ?>
               
                <table id="dyntable" class="table table-bordered responsive">
                    <colgroup>
                        
                       
                        <col class="con0" />
                        <col class="con1" />
                       
                    </colgroup>
                    <thead>
                        <tr>
                          	
                            
							
                            <th class="head1">KATEGORİ</th>
							 <th class="head1">SİL</th>
                           
                           
                          
                        </tr>
                    </thead>
                    <tbody>
					<?php $stmt=$db->prepare("SELECT * FROM `sub_category`order by name "); 
							$stmt->execute(array("")); //sorguyu çalıştır
							$prds=$stmt->fetchAll();
							$stmt->closeCursor();
							foreach($prds as $pr){    ?>
                        <tr class="gradeX">
                         
                            <td><?php echo $pr['name'] ?></td>
                           
                            <td><a href="control/functions.php?prs=deleteCat&id=<?php echo $pr['id'] ?>">SİL</a></td>
                           
                           
                        </tr>
			<?php  } }else if($_GET['id'] == 7){ ?>
					
				<form method="post" action="control/functions.php?prs=addImage" enctype="multipart/form-data">
				  <h4 class="widgettitle">Resim Ekleme Sistemi</h4>
            	<table class="table table-bordered responsive">
                    <thead>
                        <tr>
						
							
                            <th>RESİM</th>
							<th>ONAY</th>
						
                        </tr>
                    </thead>
                    <tbody>
                      <tr>
						<input type="hidden" class="form-control input-default" value="<?php echo $_GET['i']; ?>"  name="pr_id"  >
						<input type="hidden" class="form-control input-default" value="<?php echo $_GET['id']; ?>"  name="page_id"  >
						<td><input type="file" class="form-control input-default"  name="postedImage"  required></td>
						<td>
							<div class="form-group">
								<div class="col-md-10">
									<center><button type="submit" class="btn btn-primary"  >İŞLEMİ TAMAMLA</button></center>
								</div>
							</div>
						</td>
					</tr>	
                    </tbody>
                </table>
			
            </form>   
			
			
			
			<table class="table table-bordered responsive">
                    <thead>
                        <tr>
						
							<th>RESİMLER</th>
                            <th><center></center> </th>
							
						
                        </tr>
                    </thead>
                    <tbody>
					
                      <?php 
					  
					   $ID = $_GET['i'];
					   $query=$db->prepare("SELECT * FROM `pics` WHERE `pr_id` = ? ");
					   $query->execute(array($ID));
					   
						
						
					   $result=$query->fetchAll();
					   $no=$query->rowCount();
					   foreach($result as $row){
						
											
											
												
									?>
					<tr>
					   <td><img src="<?php echo $row['url']; ?>" alt="" height="300" width="500"></td>
					   <td>
						  <div class="form-group">
							 <div class="col-md-10">
								<center><a href = "control/functions.php?prs=deleteImage&i=<?php echo $row['id'] ?>&pr=<?php echo $_GET['i'] ?>" >Sil</a></center>
							 </div>
						  </div>
					   </td>
					</tr>
					<?php
					   }   
					?>
					 
                    </tbody>
                </table>	
					
					
					
					
					
			<?php	} ?>
           





        </div>
       <!--END PAGE CONTENT -->


    </div>

     <!--END MAIN WRAPPER -->

   <!-- FOOTER -->
   
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="asset/plugins/jquery-2.0.3.min.js"></script>
     <script src="asset/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="asset/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
        <!-- PAGE LEVEL SCRIPTS -->
    <script src="asset/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="asset/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
	 <!-- GLOBAL SCRIPTS -->
    <script src="asset/plugins/jquery-2.0.3.min.js"></script>
     <script src="asset/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="asset/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->

         <!-- PAGE LEVEL SCRIPTS -->
     <script src="asset/plugins/wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="asset/plugins/bootstrap-wysihtml5-hack.js"></script>
    <script src="asset/plugins/CLEditor1_4_3/jquery.cleditor.min.js"></script>
    <script src="asset/plugins/pagedown/Markdown.Converter.js"></script>
    <script src="asset/plugins/pagedown/Markdown.Sanitizer.js"></script>
    <script src="asset/plugins/Markdown.Editor-hack.js"></script>
    <script src="asset/js/editorInit.js"></script>
    <script>
        $(function () { formWysiwyg(); });
        </script>

     <!-- END PAGE LEVEL SCRIPTS -->
</body>
     <!-- END BODY -->
</html>
