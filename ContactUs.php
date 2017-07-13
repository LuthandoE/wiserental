<?php

?>
<html>
<head>
  <title>Contact Us</title>
 <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" href="w3/w3.css" />
  <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
  <link href="assets/font-awesome-4.5.0/css/font-awesome.css" rel="stylesheet" />
   <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="scripts.js"></script>
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
  .price{ position: absolute; top: 3px; padding-left: 3px;}
  a{ text-decoration: none !important;}
  .crop{ height: 250px; overflow: hidden; }
  .crop img{ height: auto;}
  .glyphicon-map-marker{color:#8B0000;}
  </style>
</head>
<body class="w3-light-grey">
  <?php include_once("Navbar.htm");  ?> 
  <div class="container w3-white">
     <div class="w3-padding-64">
        <h1 class="w3-center w3-padding-top"><span class="	fa fa-comment w3-text-blue"></span> Get In Touch With Us:</h1>
        <hr />
        <div class="w3-row-padding">
           <div class="w3-quarter">
           
            <div class=" w3-padding">
                <h3>Address: </h3>
                <p>Get in touch with us...</p>
                <p><i class="fa fa-map-marker w3-text-teal w3-xlarge"></i> 420 Randles Road Overport, <br/>
                  &nbsp;&nbsp; Durban, South Africa</p>
                <p><i class="fa fa-phone w3-text-teal w3-xlarge"></i> <strong>031 110 0033</strong> </p>
                <p><i class="fa fa-mobile w3-text-teal w3-xlarge"></i>&nbsp; <strong>083 730 2653</strong></p>
                <p><i class="fa fa-envelope-o w3-text-teal w3-xlarge"></i> &nbsp;<strong>info@rentalwise.co.za</strong></p>
                
                <p class="w3-margin-top"><!-- <a class="w3-btn-floating w3-teal w3-hover-indigo" href="https://www.facebook.com/sihle.l.dlamini" title="Facebook"><i class="fa fa-facebook"></i></a>
                    <a class="w3-btn-floating w3-teal w3-hover-blue"
                    href="https://twitter.com/LuthandoDlamini " title="Twitter"><i class="fa fa-twitter"></i></a>
                    <a class="w3-btn-floating w3-teal w3-hover-red"
                    href="https://plus.google.com/u/0/app/basic/103739394219354837528?tab=XX" title="Google +"><i class="fa fa-google-plus"></i></a>
                    <a class="w3-btn-floating w3-teal w3-hover-blue-grey"
                    href="http://www.linkedin.com/in/luthando-dlamini-27392b98?trk=nav_responsive_tab_profile" title="Linkedin">
                    <i class="fa fa-linkedin"></i>
                </a> -->
                <ul class="w3-ul">
                 <li class="w3-border-0">
                
                    <a class="w3-btn-floating w3-teal w3-hover-indigo" href="https://www.facebook.com/sihle.l.dlamini" title="Facebook"><i class="fa fa-facebook"></i></a>
                    <a class="w3-btn-floating w3-teal w3-hover-blue"
                    href="https://twitter.com/LuthandoDlamini " title="Twitter"><i class="fa fa-twitter"></i></a>
                    <a class="w3-btn-floating w3-teal w3-hover-red"
                    href="https://plus.google.com/u/0/app/basic/103739394219354837528?tab=XX" title="Google +"><i class="fa fa-google-plus"></i></a>
                    <a class="w3-btn-floating w3-teal w3-hover-blue-grey"
                    href="http://www.linkedin.com/in/luthando-dlamini-27392b98?trk=nav_responsive_tab_profile" title="Linkedin">
                    <i class="fa fa-linkedin"></i></a>
                </li>
                </ul>
                </p>
            </div>
              
              
           </div>
           <div class="w3-half">
            <div class="w3-padding-left">
            <div id="form-messages"></div>
            <form role="form" class="w3-form" id="contactForm">
            <div class="w3-group">
                <input class="w3-input w3-light-grey" id="name" style="width:100%;" name="name" type="text" required="" />
                <label class="w3-label">Name</label>
            </div>
            <div class="w3-group">
                <input id="email" name="email" class="w3-input w3-light-grey" style="width:100%;" type="text" required="" />
                <label class="w3-label">Email</label>
            </div>
            <div class="w3-group">
                <textarea name="message" id="message" class="w3-input w3-light-grey" style="width:100%;" required=""></textarea>
                <label class="w3-label">Message</label>
            </div>
            
             <div class="w3-group"> <?php //echo $message; ?> </div>
            <div class="w3-padding-bottom ">
            <button type="submit" name="submit" id="form-submit" class="w3-btn w3-right w3-round-xlarge">Submit Form</button>
            <br /><hr />
            
            <div id="msgSubmit" class="h3 text-center hidden">Message Submitted!</div>
            </div>
            </form>
              </div>
           </div>
           
           
        </div>
     </div>
   </div>
  
  
  
</body>
</html>