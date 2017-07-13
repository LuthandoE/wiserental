<?php

    ob_start();
	session_start();
	require_once('config.php');
   // require_once('error_handler.php');
    require_once('News.php');
   
     $conn = new News();
	 //$dbcon = mysqli_select_db($conn ,DB_DATABASE);
    
        
//	 it will never let you open index(login) page if session is set
	if ( isset($_SESSION['user'])!="" ) {
		header("Location: addNews.php");
		exit;
	}
	
	if( isset($_POST['btn-login']) ) {
		
		$username = $_POST['username']; 
		$upass = $_POST['pass'];
        
       // $username = strip_tags(trim($username));
	//	$upass = strip_tags(trim($upass));
         
		//$password = hash('sha256', $upass); // password hashing using SHA256
		
		$res = $conn->getUsername($username);
		
		$row = mysqli_fetch_array($res);
		
		$count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
	//	$password = hash('sha256', $upass);
		if( $count == 1 && $row['pass']== $upass) {
		  
			$_SESSION['user'] = $row['userid'];
			header("Location: addNews.php");
		} else {
			$errMSG = "Wrong Credentials, Try again...";
		}
	   }
     
    
?>
<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login </title>
  
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" href="w3/w3.css" />
  <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
  <link href="assets/font-awesome-4.5.0/css/font-awesome.css" rel="stylesheet" />
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
  
  #section1 {padding-top:50px;height:400px ;}
  #section2 {padding-top:10px; background-color: #ffffff;}
  #section3 {padding-top:10px;  background-color: #ffffff;}
  #section41 {padding-top:10px;background-color: #ffffff;}
  #section42 {padding-top:10px; background-color: #ffffff;}
  #section5 {padding-top:10px; background-color: #ffffff;}
  #section6 {padding-top:10px; background-color: #ffffff;}
  #section42 {padding-top:10px; background-color: #ffffff;}
  .l-container{height: 360px;}
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img { width: 100% ; height: 40% ; background-color: black;}
  .carousel-control { width: 4%;}
  .carousel-control.left, .carousel-control.right{background-image: none;}
  a{ text-decoration: none !important;}
  .crop{ height: 250px; overflow: hidden; }
  .crop img{ height: auto;}
  .glyphicon-map-marker{color:#8B0000;}
  </style>
</head>
<body class="w3-light-grey">
<?php include_once("Navbar.htm") ?>
<div class="container w3-margin-lef">
    <br /><br />
	<div  class="w3-light-grey w3-content"><br />
    <form method="post" autocomplete="off"><br />
       <div class="col-md-3"></div>
    	<div class="col-md-6 w3-card-2 w3-margin-top w3-white w3-round-large">
	        <div class="form-group">
            	<h2 class="">Login:</h2>
            </div>
        
        	<div class="form-group">
            	<hr />
            </div>
            
            <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-danger">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="text" name="username" class="form-control" placeholder="Enter Your Email" required />
                </div>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Your Password" required />
                </div>
             
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-login">Login</button>
            </div>
            
            <div class="form-group">
                <p class="w3-center">New user...? Sign up <a href="register.php? i= <?php echo mt_rand(); ?>">here</a></p>
            	<hr />
            </div>
        </div>
        
    </form>
    </div>	

</div>

</body>
</html>