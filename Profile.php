<?php

ob_start();
session_start();

require_once('config.php');
//require_once('error_handler.php');
require_once('News.php');



 if( !isset($_SESSION['user']) ) {
	header("Location: admin.php");
	exit;
}

$news = new News();

$resSess = $news->getUserID($_SESSION['user']);
$use_row = mysqli_fetch_array($resSess);
//Populating a dropdown
$c = '';
$result = $news->GetCity();
while ($row = mysqli_fetch_array($result)){
	
		$c .='<option>'.$row['location'].'</option>';
	}

    
?>
<html>
<head>
  <title>Rental Wise</title>
  <link rel="stylesheet" href="w3/w3.css" />
  <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
  <link href="assets/font-awesome-4.5.0/css/font-awesome.css" rel="stylesheet" />
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
  .lbl{ font-weight: normal !important;}
  .glyphicon-map-marker{color:#8B0000;}
  </style>
</head>
<body>
  <?php include_once("Nav.htm");  ?> 
  <div class="container">

   </div>

</body>
</html>