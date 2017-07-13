<?php
   require_once("config.php");
   require_once("News.php");

    $news = new News();
    $getNews = $news->getNewsID($_GET['id']);
    
   // $topNews = $news->getTopNews($news->getID($_GET['id']));
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
<?php include_once('Navbar.htm') ?>
<div class="container w3-white w3-margin-top">
    <div class="w3-row-padding w3-margin-top">
      <div class="col-md-7">
      <br />
      <?php while($row = mysqli_fetch_array($getNews)){ ?>      
          <div class="container-fluid">
             
             <h2><?php echo $row['carMake']; ?> 
             &nbsp;<span class="w3-xlarge w3-text-blue-grey"> <?php echo $news->editCat($row['pid']); ?></span></h2>
             <div  class="w3-content">
             <img  src="image/<?php echo $row['image'];  ?>" class="img-responsive w3-center" /></div>
             <br />
          </div>
          
          <div class="container-fluid">
          
            <h3>Description</h3> 
            <?php echo nl2br($row['description']); ?> 
           
            <hr />
            <table class="w3-table w3-striped">
             <tr><th>Vehicle Type: </th><th>Transmission:</th></tr>
              <tr> 
                 <td><?php echo $row['vehicle_type']; ?></td>
                 <td><?php echo $row['aut_manuel'] ?></td>
              </tr>
              <tr><th>Features</th><th></th>
              <td>&nbsp;</td><td>&nbsp;</td>
              </tr>
            </table>
            <hr />
          </div>
          
    </div>
    <div class="col-md-4 w3-light-grey w3-center">
    <hr /><div class="container-fluid">
     <table class="table w3-white" >
           <th class="w3-teal" colspan="2"><a href="https://www.facebook.com/sihle.l.dlamini" class="w3-btn-floating w3-indigo">
            <i class="fa fa-facebook-f"></i>
        </a> <a href="https://twitter.com/LuthandoDlamini" class="w3-btn-floating w3-blue">
            <i class="fa fa-twitter w3-xlarge "></i>
        </a> <a href="https://plus.google.com/u/0/app/basic/103739394219354837528?tab=XX"
            class="w3-btn-floating w3-red">
            <i class="fa fa-google-plus"></i>
        </a>
        <a href="http://www.linkedin.com/in/luthando-dlamini-27392b98?trk=nav_responsive_tab_profile"
          class="w3-btn-floating w3-blue-grey">
             <i class="fa fa-linkedin"></i>
        </a></th>
           <tr>
              <td><h3><?php echo "R" .$row['price'] ?></h3><h4>Per Day</h4></td>
              <td ><h3><?php echo "R" .$row['price'] ?></h3><h4>Per Monthly</h4></td>
     
              <tr>
              <td colspan="2"><p>Minimum rental period <?php echo $row['period']; ?> day(s).</p></td>
              
              </tr>
              <tr><td colspan="2"><p><strong>No hidden costs!</strong></p></td></tr>
              <tr>
                <td colspan="2"><a href="hire.php?id=<?php echo $row['nid']; ?>" class="w3-btn w3-amber w3-padding w3-large w3-round">
                <strong>Hire this car</strong></a></td>
              </tr>
              
               
           </tr></table>
           <div class="w3-white"><header class="w3-padding w3-blue"><strong>Airport Car Pick Up/ Drop Off Options:</strong> </header>
           <p class="w3-padding"><?php echo $row['pick_drop_opt']; ?></p>
           </div>
           
           <div class=""><header class="w3-padding w3-blue"><span class="fa fa-user w3-large"> 
              <?php echo $row['name'] ?>
           </span> </header>
           <table class="w3-table w3-white">
           <tr><td><div><img src="image/<?php echo $row['picture'] ?>" style="width: 100px; height: 100px;" /></div></td>
           
           <td><span class="fa fa-map-marker"></span> <?php echo $news->editCat($row['pid']);  ?>
           <br /><hr /> Joined <?php echo date_format(date_create($row['created_on']),"d F Y "); ?>
           </td></tr>
           </table>
           </div>
           <?php } ?>
           <hr />
           <div><h4>Reviews:</h4>
           <p class="w3-white w3-padding w3-round-large">Reviews will be here..............</p>
           </div>
           </div>
  </div>
  </div>
</div>

</body>
</html>