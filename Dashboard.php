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

$user = $news->getUser($_SESSION['user']);

$car = $news->getVehicle($_SESSION['user']);

$resSess = $news->getUserID($_SESSION['user']);
$use_row = mysqli_fetch_array($resSess);
//Populating a dropdown
$c = '';
$result = $news->GetCity();
while ($row = mysqli_fetch_array($result)){
	
		$c .='<option>'.$row['location'].'</option>';
	}
$requests = $news->HireRequest($_SESSION['user']);

    
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
<body class="w3-light-grey">
   <?php include_once ("Nav.htm") ?>
   <br />
  <div class="container w3-padding-24 w3-white">
  <br />
  <h3><span class="fa fa-dashboard"></span> My Dashboard</h3>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#dash" class="w3-amber w3-hover-yellow" >Dashboard</a></li>
   <!-- <li><a data-toggle="tab" href="#msg" class="w3-amber w3-hover-yellow">Messages</a></li> -->
    <li><a data-toggle="tab" href="#hr" class="w3-amber w3-hover-yellow">Hire Requests</a></li>
    <li><a data-toggle="tab" href="#vm" class="w3-amber w3-hover-yellow">Vehicle Management</a></li>
   <!-- <li><a data-toggle="tab" href="#rv" class="w3-amber w3-hover-yellow">Reviews</a></li> -->
  </ul>
  
   <div class="tab-content">
  <div id="dash" class="tab-pane fade in active">
    
    <div class="w3-half w3-padding-48">
    <div class="w3-white w3-center">
           <?php while($row = mysqli_fetch_array($user)) {
      
                ?>   
                
              
              <hr class="w3-border-light-blue" />
                 <img src="image/<?php echo $row['picture']; ?> " width="40%" class="w3-round-jumbo" />
              <br /><br />
             <h4 class="w3-grey w3-padding w3-round-jumbo"><span class="fa fa-user"></span> <?php echo $row['name']; ?> <?php echo $row['surname']; ?></h4>
             <p><span class="fa fa-map-marker w3-medium"></span><strong> <?php echo $row['location']; ?></strong>
             </p>
             <p><span class="fa fa-clock-o"></span> Joined on <?php echo date_format(date_create($row['created_on']),"d F Y "); ?></p>
             
            
             <hr />
       </div>    
    </div>
    
     <div class="w3-quarter">
       &nbsp;
    </div>

    <div class="w3-quarter w3-padding-48">
    
    <a href="addNews.php?id=<?php echo mt_rand(); ?>" class="w3-btn w3-blue w3-padding">List your car</a> 
              <a href="SearchSP.php?city=<?php echo $row['location']; ?> "  class="w3-btn w3-teal w3-padding">Hire a car</a>
          <?php } ?>
           <h3>My Trips:</h3>
           <hr class="w3-border-light-blue" />
           </div>  
  </div>
   
  <div id="hr" class="tab-pane fade">
    <h4 class="w3-text-teal">Renters Requests >>> </h4>
    <table class="w3-table w3-striped w3-card w3-border-teal">
    <tr>
       <th>Renters Name</th>
       <th>Renters Email</th>
       <th>Renters Phone</th>
       <th>Car Booked</th>
       <th>Car Model</th>
       <th>Status</th>
       <th colspan="2">Content Control</th>
    </tr>
    <?php while($row = mysqli_fetch_array($requests)){ ?>
    <tr>
       <td><?php echo $news->userName($row['userid']); ?></td>
       <td><?php echo $news->getEmail($row['userid']); ?></td>
       <td><?php echo $news->getPhone($row['userid']); ?></td>
       <td><?php echo $row['carMake']; ?></td>
       <td><?php echo $row['model_year']; ?></td>
       <td><?php echo $row['status'] ?></td>
       <td><a href="#">Approve</a></td><td><a href="#">Delete</a></td>
    </tr>
     <?php } ?>
    </table>
   
  </div>
  
  <div id="vm" class="tab-pane fade">
    <h4 class="w3-text-teal">My Vehicles >>> </h4>
    
    <table class="w3-table w3-striped w3-card w3-border-teal">
    
      <tr>
         <th>Car Make</th>
         <th>Posted On</th>
         <th>Rental Period</th>
         <th colspan="2">Content Control</th>
      </tr> 
      <?php while($row = mysqli_fetch_array($car)){ ?>
      <tr>
        <td><?php echo $row['carMake']; ?></td>
        <td><?php echo date_format(date_create($row['posted_on']),"d F Y "); ?></td>
        <td><?php echo $row['period']; ?></td>
        <td><a href="#"><span class="fa fa-pencil w3-text-brown"></span> Delete</a></td>
        <td><a href="#">&nbsp;</a></td>
      </tr> 
       <?php } ?> 
    </table>    
   
  </div>
  
 <!--  <div id="msg" class="tab-pane fade">
    <h3>This is a messasge</h3>
    <div class="w3-half">1</div>
    <div class="w3-quarter">2</div>
    <div class="w3-quarter">3</div>
  </div> -->
  <!--
   <div id="rv" class="tab-pane fade">
    <h3>M reviews:</h3>
    <div class="w3-half">
    
       <p>You currently have no reviews.</p>
    </div>
    <div class="w3-quarter">
    
    
    <span class="fa fa-star w3-text-teal"></span>
    <span class="fa fa-star w3-text-teal"></span>
    <span class="fa fa-star w3-text-teal"></span>
    <span class="fa fa-star w3-text-teal"></span>
    <span class="fa fa-star w3-text-teal"></span>
    
    </div>
    <div class="w3-quarter">3</div>
  </div>
  -->
</div>

</div>
</body>
</html>