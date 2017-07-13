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
//Getting a category id
$message = '';
$make = $desc = $image = $price = $userid = "";
$Errheadline = $Errarticle = $Errimage = $Errsub_category = $Erruserid = $Errcategory = "";

if(isset($_POST['post'])){
	
	   $make = test_input($_POST['carMake']);
       $price = test_input($_POST['price']);
       $period = test_input($_POST['period']);
       $image =  $_FILES['image']['name'];
       $Errsub_category = "Sub category required";
   	   $desc = test_input($_POST['desc']);
       $userid = test_input($_SESSION['user']);
 	  
    $btn = "submit";
	$news->post($desc, $make,$price,$image,$period,$userid,$btn);
	
}
    
?>
<html>
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
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
    <div class="container w3-padding-64 w3-white">
      <div class="w3-center"><h1> 
          <span class="glyphicon glyphicon-share w3-text-blue"></span>  List Your Car</h1>
          <p>Secure, easy and efficient way to make additional income with your car! </p>          
      <hr class="w3-border w3-border-light-blue" /><br />
      </div>
    
    <div class="w3-padding w3-white">
            <header><h4>Required information before you start listing your car:</h4></header>
             <p>
                 <ul>
                    <li>You must have SA vehicle and bank account.</li>
                    <li>Your car make, model, variant and registration year.</li>
                    <li>Licence plate and VIN number.</li>
                    <li>Recent  odometer reading.</li>
                    <li> Your car photos atleast 640X480.</li>
                    <li>Your bank account details. </li>
                 </ul>    
             </p>
    </div>   
    <hr />
    <div class="w3-row-padding">
   
        <div class="w3-half ">
        
           <div class="w3-card-2 w3-padding w3-white">
          
            <form  autocomplete="off" method="post" enctype="multipart/form-data" >
            <div class="form-group">
                <p>Required fields. <span class="w3-text-red">*</span></p>
            </div>
            <div class="form-group">
                <hr />
            </div>
            <div class="form-group">
                <label class="w3-label w3-text-black">Car Make/Model: <span class="w3-text-red">*</span></label>
            	<div class="input-group">
                <span class="input-group-addon"><span class="fa fa-car"></span></span>
            	<input type="text" name="carMake" class="form-control" placeholder="Enter Car Make" required="" />
                </div>
            </div>
            
             <div class="form-group">
                <label class="w3-label w3-text-black">Price/per day: <span class="w3-text-red">*</span></label>
            	<div class="input-group">
                <span class="input-group-addon"><span class="fa fa-money"></span></span>
            	<input type="text" name="price" class="form-control" placeholder="Your price" required="" />
                </div>
            </div>
            
             <div class="form-group">
                <label class="w3-label w3-text-black">Rental period: <span class="w3-text-red">*</span></label>
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            	<input type="number" name="period" class="form-control" placeholder="Enter number of rental days"
                     min="0" required="" />
                </div>
            </div>
            
             <div class="form-group">
                <label class="w3-label w3-text-black">Image : <span class="w3-text-red">*</span></label>
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-picture"></span></span>
                <input class="form-control" name="image" required="" type="file"/>
                </div>
            </div>
           </div>
        </div>
        
        <!-- Second Half -->
         <div class="w3-half">
          
         <div class="w3-card-2 w3-padding w3-white">
            <div class="form-group">
                <label class="w3-label w3-text-black lbl">Give renters a short description about your car.</label>
            </div>
            
            <div class="form-group">
                <label class="w3-label w3-text-black">Description: <span class="w3-text-red">*</span></label>
            	<div class="input-group">
                <span class="input-group-addon"><span class="fa fa-pencil-square-o w3-large"></span></span>
                <textarea name="desc" required="" class="form-control" rows="6" wrap="hard" id="comment"></textarea>
                </div>
            </div>
            
            <div class="form-group">
   	         <hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="post">Submit form</button>
            </div>
            
            <div class="form-group">
   	         <hr />
            </div>
         </div>   
       
         </div>
       </div>
          
         </form>
         <hr class="w3-border w3-border-light-blue" />         
        </div>
    </div>
       
      </div>
 
</body>
</html> 