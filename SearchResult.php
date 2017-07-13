<?php

ob_start();
session_start();

require_once('config.php');
require_once('News.php');



// if( !isset($_SESSION['user']) ) {
//	header("Location: index.php");
//	exit;
//}
//$city = $_GET['locality'];

$news = new News();

$datetime1 = date_create($_GET['datetime1']);
$datetime2 = date_create($_GET['datetime2']);

$interval = date_diff($datetime1, $datetime2);

$location = $news->getLocationID($_GET['locality']);
$search = $news->search($location, $interval->format('%d'));

?>
<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="css/w3.css" />
  <link rel="stylesheet" href="css/bootstrap.css"/>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
  <link href="assets/font-awesome-4.5.0/css/font-awesome.css" rel="stylesheet" />
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>

<body>
   <?php include_once('Navbar.htm') ?>
   <br />
   <hr />
   <div class="container w3-padding-64">
        <?php  while($row = mysqli_fetch_array($search)) {?>
   <div class="w3-row-padding">
       <div class="w3-half">
          <div class="w3-image w3-card">
          <img src="image/<?php echo $row['image'];  ?>" />
          </div>
       </div>
       <div class="w3-quarter">
          <div class="w3-card w3-padding">
              <header class=""><h2 class="w3-text-blue"><?php echo $row['name']."'s"; ?> <?php echo $row['carMake'];  ?></h2></header>
              <h3><?php echo "R". $row['price']; ?> </h3>
              <h5><span class="fa fa-calendar"></span> <?php echo $row['period']." days minimum rental period"; ?> </h5>
              <h5><span class="fa fa-cogs"></span> <?php echo $row['aut_manuel']; ?></h5>
              <h5><span class="fa fa-map-marker"></span> <?php echo $news->getLocation($row['pid']); ?></h5>
              
              <p>Reviews: </p>
              <hr />
              <div class="w3-center"><a href="#" class="w3-btn w3-large w3-amber w3-round-large w3-center">View Car</a></div>
          </div>
       </div>
       <div class="w3-quarter"></div>
       <?php  } ?>
       
       </div>
   </div>
   
</body>
</html>