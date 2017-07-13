<!DOCTYPE html>
<html>
<head> 
  <link rel="stylesheet" href="w3/w3.css" />
  <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
  <link href="assets/font-awesome-4.5.0/css/font-awesome.css" rel="stylesheet" />
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="../js/bootstrap-datepicker.js"></script>
  
  
</head>
<body class="w3-lightgrey">
   <?php include_once('Navbar.htm'); ?>
   <div class="container w3-padding-64" >
     <h1 class="w3-center">Account Verification:</h1>
     <hr />
     <form class="form-inline w3-center" role="form" action="verification.php" method="post">
            <div class="form-group">
              <input id="autocomplete" placeholder="Enter verification"
              type="text" class="form-control" />
              <button class="w3-button w3-blue w3-medium w3-round" >Submit</button>
             </div>
     </form>
     <p class="w3-center">Resend verification <a href="">here</a></p>
     <hr />
     <p class="w3-center"><?php echo ""; ?></p>
   </div>
</body>
</html>