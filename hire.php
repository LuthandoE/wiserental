<?php
ob_start();
session_start();
   require_once("config.php");
   require_once("News.php");

   
    if( !isset($_SESSION['user']) ) {
	header("Location: admin.php");
	exit;
}

   
    $news = new News();
   // $getNews = $news->hire($_GET['id']);
   $resSess = $news->getUserID($_SESSION['user']);
   $use_row = mysqli_fetch_array($resSess); 
   // $topNews = $news->getTopNews($news->getID($_GET['id']));
   $carO = $news->viewCar($_GET['id']);
   $carQ = $news->viewCar($_GET['id']);
   $carOwner = $news->viewCar($_GET['id']);
   $ownr = $news->viewCar($_GET['id']);
   
  // $period = 0;
   

   
  // $period->format('%d');
   
   
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
<body class="w3-light-grey">
<?php include_once('Nav.htm') ?>
<div class="container w3-white">
    <div class="w3-row-padding">
   <div class="w3-half w3-padding-48">
   <?php while($row = mysqli_fetch_array($carO)){ ?>
      <h2><span class="fa fa-book w3-btn-floating w3-padding-top w3-blue"></span> Request <?php echo $row['name']. "'s ".$row['carMake']; ?> :</h2>
      
   <?php }  ?>
      <br />
      <h4>Rental period: <span class="w3-text-red">*</span></h4>
       <hr />
       <form role="form" class="" method="post" action="<?php  echo  $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label for="datepicker">Pickup Date:</label>
            <input type="date" name="datepicker" id="datepicker" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('2020-12-31'); ?>" class="form-control" id="pdate"/>
        </div>
        <div class="form-group">
            <label for="date_picker">Return Date:</label>
            <input type="date" name="date_picker" id="date_picker" onclick="Cd()" class="form-control" value="<?php echo date('Y-m-d'); ?>"  min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('2020-12-31');?>"  id="pdate"/>
        </div>
        <br /><br />
        <header class="w3-light-blue w3-round-medium"><h4 class="w3-padding ">Rental Cost:</h4></header>
        <div class="w3-card w3-round">
        <?php while($row = mysqli_fetch_array($ownr)){ ?>
        <p class="w3-padding">You will be required to pay the following within <strong>24hours</strong> once <?php echo $row['name'] ?> has accepted your request.</p>
        
        <table class="w3-table w3-striped">
          <tr>
             <td>Rental period</td><td>
              <input name="price" id="price" type="text" value="<?php echo "R".$row['price']; ?>" class="w3-border-0" size="5"  />
              </td><td><input type="text" id="demo" name="demo" size="10" value="" min="0" class="w3-border-0" />
             <?php //echo $period. " day(s)"; ?></td><td><input type="text" name="pricetot" id="pricetot" size="10" value="" class="w3-border-0" /></td>
          </tr>
          <?php } ?>
          <tr>
             <td>Insurance</td><td></td><td></td>
          </tr>
          <tr>
              <td>Deposit</td><td></td><td></td>
          </tr>
          <tr>
              <td><strong>Total:</strong></td><td></td><td></td>
          </tr>
        </table>
        <p class="w3-padding">
           Kilometers included: 80km / day.
            You will be charged R 15.20 for every kilometer over, and to replace petrol if you didn't fill up before returning the vehicle.
          </p>
          <p class="w3-padding">
            * You may be charged up to a maximum of R5000 insurance excess in case of an accident or damage to the vehicle. i.e. any repairs less than R5000 will be for the renter’s account and deducted from the deposit.
           </p>
           
        <p class="w3-padding">   † Deposit will be refunded 15 days after the vehicle was returned, less extra fuel, extra kms, insurance excess and any fines incurred over your rental.</p> 
        <p class="w3-padding">‡ Please enquire with the owner if they will require a delivery fee (usually between R250-R350). This would be paid directly to the owner.
        </p>
        </div>
        <br />
        <div class="form-group">
          <label>Introduce yourself: <span class="w3-text-red">*</span></label>
          <p>Tell the car's owner how you plan to use their vehicle.</p>
        </div>
        <div class="form-group">
          
          <textarea rows="5" cols="55" required="" class="form-control"></textarea>
        </div>
        <br />
         <div class="form-group w3-margin-top">
          <label>Identify yourself: <span class="w3-text-red">*</span></label>
          <h5><strong>Your ID or Passport No.</strong></h5>
          <p>Please supply your ID or passport number:</p>
          <input class="form-control" required="" type="text" />
        </div>
        <div class="form-group">
          <label>Upload your driver's licence <span class="w3-text-red">*</span></label>
          <p>Please supply a scan or photograph of valid drivers licence to rent a car.</p>
        </div>
        <div class="form-group">
                <label class="w3-label w3-text-black">Image : <span class="w3-text-red">*</span></label>
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-picture"></span></span>
                <input class="form-control" name="image" required="" type="file"/>
                </div>
        </div>
        <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="post">Send request</button>
        </div>
        </form>
   </div>
   <div class="w3-third w3-padding-64">
      <div class="w3-card w3-round-large">
      <?php while($row = mysqli_fetch_array($carQ)){ ?>
        <header class="w3-light-blue w3-padding-tiny w3-round-large"><h4 class="w3-padding-left"><span class="fa fa-car"></span> 
        <?php echo $row['name']. "'s ".$row['carMake']." ". $row['model_year']; ?> </h4></header>
        <div class="w3-image w3-center w3-padding">
        <img src="image/<?php echo $row['image']; ?>" />
        </div>
        <p class="w3-padding">
           <?php echo $row['description']; ?><br />
           
        </p>
        <p class="w3-padding"><strong>Trasmission:</strong>
        <?php echo $row['aut_manuel']; ?>
        </p>
        <p class="w3-padding"><strong>Features:</strong></p>
        <?php } ?>
      </div> 
      <br />
      <div class="w3-card w3-round-large">
      <?php while($row = mysqli_fetch_array($carOwner)){ ?>
        <header class="w3-light-blue w3-padding-tiny w3-round-large"><h4 class="w3-padding-left"><span class="fa fa-user"></span> 
        <?php echo $row['name']; ?> </h4></header>
        <div class="w3-image w3-padding w3-center ">
           <img src="image/<?php echo $row['picture']; ?>" class="w3-circle" width="60%" />
        </div>
        <p class="w3-padding w3-center"><span class="fa fa-map-marker"></span>
          <strong> <?php echo $news->editCat($row['pid']).","; ?> <?php echo $news->getCo($row['pid']); ?></strong><br />
          <span class="fa fa-clock-o"></span> Joined <?php echo date_format(date_create($row['created_on']),"d F Y "); ?>
        </p>
        </div>
        <?php } ?>
      </div>
   </div>
   </div>
</div>
  <script>
    function Cd(){
        
    var day_start1 = document.getElementById("datepicker").value;
    var day_start2 = document.getElementById("date_picker").value;
    
    var day_start = new Date(day_start1);
    var day_end = new Date(day_start2);
    var total_days = (day_end - day_start) / (1000 * 60 * 60 * 24);
    document.getElementById("demo").value = Math.round(total_days) + " day(s).";
    
    var price = document.getElementById("price").value;
    price = price.substr(1);
    var fTot = total_days * price;
    
    document.getElementById("pricetot").value = fTot;
    }
    
  </script>
</body>
</html>