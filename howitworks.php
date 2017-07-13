<?php

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
<body>

<div class="container w3-white" >   
<?php include_once('Navbar.htm'); ?>
<div id="section1" class="container-fluid w3-border-bottom" style="background-image: url(image/jaguar.jpg);" >
 <div class="container-fluid">  
<div class="row">
    <div class="w3-padding-64 w3-center w3-content">
         <div class="jumbotron w3-round-jumbo container-fluid w3-white w3-padding w3-light-grey">
             <h2>Rental Wise - Car Rental Service </h2>
             <p>Easy, efficient &AMP;
               reliable platform for car renters &AMP; onwers to do car renting!</p> 
         </div>            
    </div>
  </div></div>
</div>
</div>

<div id="section2" class="container w3-border-bottom">
    <div class="w3-row-padding">
       <div class="w3-third">
         <div class="w3-card-2">
            <header class="w3-padding w3-blue w3-border-bottom w3-border-amber" ><h3>
            <span class="glyphicon glyphicon-search"></span> Rent A Car - Renter</h3></header>
            <p class="w3-padding">
               <strong>Step 1: </strong>
               Create an account and search for the car that would 
               perfectly suit your needs.
            </p>
            <p class="w3-padding">
               <strong>Step 2: </strong>
               When you have found the car that you would like to rent.
               Request to book it by clicking "Hire this car". You'll then wait
               for the onwer to approve your request which last 24 hours.
            </p>
            
            <p class="w3-padding">
               <strong>Step 3: </strong>
               When the owner has accepted your request.
               You will then make the payment via either 
               EFT or credit card.
            </p>
         </div>
         <div class="w3-card-2">
            <p class="w3-padding">
               <strong>Step 4: </strong>
               When payment has been settled arrange to pick up the 
               car from the owner. Carefully do the vehicle inspection
               with the owner and sign the approval document. Have the copy 
               of the document both of you.
            </p>
            
            <p class="w3-padding">
               <strong>Step 5: </strong>
               Last step is to return the car to the owner in its good shape.
               Thank the owner and share the experience you had with his/her car.
            </p>
            <hr />
            <div class="w3-center"><a href="register.php?s=<?php mt_rand(); ?>" class="w3-btn w3-amber">Rent A Car</a></div>
            <hr />
         </div>
       </div>
       <div class="w3-third">
          <div class="w3-card-2">
            <header class="w3-padding w3-blue w3-center w3-border-bottom w3-border-amber" >
            <h3><span class="glyphicon glyphicon-share"></span> List A Car - Owner</h3></header>
            <p class="w3-padding">
               <strong>Step 1: </strong>
               List your car and make an extra cash.
               Create an account and start listing your car by
               clicking on "List Your Car". Follow the steps and ensure that
               your car photos are clear and in good state so it will attract 
               bookings.
            </p>
            <p class="w3-padding">
               <strong>Step 2: </strong>
               Now prepare yourself to recieve rental requests via 
               emails or SMSs. You decide on who gets to rent your car
               but you are adviced to first communicate with the renter
               and be satisfied before accepting booking request. 
               
            </p>
            <p class="w3-padding">
               <strong>Step 3: </strong>
               When you are satisfied. Accept the request
               and ask for payment from the renter adn you will be notified 
               when the payment has been settled. 
            </p>
            
           </div>
           <div class="w3-card-2">
            <p class="w3-padding">
               <strong>Step 4: </strong>
              Arrange a place to meet with the renter and do the vehicle inspection
              and sign the approval document together with the renter. You can charge additional
              fee for dropping off the car with the renter. 
            </p>
            <p class="w3-padding">
               <strong>Step 5: </strong>
              When the rental period has come to an end. The renter will bring the vehicle and your keys back. You will
              do the final inspection and sign the approval document together.
            </p>
            
            <p class="w3-padding">
               <strong>Step 6: </strong>
              Payment will be made to your bank account by RentalWise on the 25th of the month.
            </p>
            <hr />
            <div class="w3-center"><a href="register.php?s=<?php mt_rand(); ?>" class="w3-btn w3-amber">List A Car</a></div>
            <hr />
           </div>
       </div>
       
       <div class="w3-third">
          <div class="w3-card-2">
            <header class="w3-padding w3-blue w3-border-bottom w3-border-amber" ><h3>Also see: </h3></header>
            <ul class="w3-ul">
              <li>FAQ</li>
              <li><a class="w3-btn-floating w3-teal w3-hover-indigo" href="https://www.facebook.com/sihle.l.dlamini" title="Facebook"><i class="fa fa-facebook"></i></a>
                <a class="w3-btn-floating w3-teal w3-hover-blue"
                href="https://twitter.com/LuthandoDlamini " title="Twitter"><i class="fa fa-twitter"></i></a>
                <a class="w3-btn-floating w3-teal w3-hover-red"
                href="https://plus.google.com/u/0/app/basic/103739394219354837528?tab=XX" title="Google +"><i class="fa fa-google-plus"></i></a>
                <a class="w3-btn-floating w3-teal w3-hover-blue-grey"
                href="http://www.linkedin.com/in/luthando-dlamini-27392b98?trk=nav_responsive_tab_profile" title="Linkedin">
                <i class="fa fa-linkedin"></i></a></li>
            </ul>
           </div>
       </div>
    </div>

</div>
<?php include_once('footer.htm'); ?>
</body>
</html>