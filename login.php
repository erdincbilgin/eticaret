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
     <!-- PAGE LEVEL STYLES -->
     <link rel="stylesheet" href="asset/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="asset/css/login.css" />
    <link rel="stylesheet" href="asset/plugins/magic/magic.css" />
     <!-- END PAGE LEVEL STYLES -->
   <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body >

   <!-- PAGE CONTENT --> 
    <div class="container">
    <div class="text-center">
       
    </div>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
            <form action="control/functions.php?prs=loginCheck" method="post" class="form-signin">
                
                <input type="text" name="email" placeholder="Kullanıcı Adınız" class="form-control" />
                <input type="password" name="pass"  placeholder="Şifre" class="form-control" />
                <button class="btn text-muted text-center btn-danger" type="submit">Giriş Yapınız</button>
            </form>
        </div>
        
    </div>
   


</div>

	  <!--END PAGE CONTENT -->     
	      
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="asset/plugins/jquery-2.0.3.min.js"></script>
      <script src="asset/plugins/bootstrap/js/bootstrap.js"></script>
   <script src="asset/js/login.js"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>
