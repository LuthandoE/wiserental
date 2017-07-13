<?php
require_once("config.php");
require_once("News.php");
 
 $newsObj = new News(); 
 $res = $newsObj->getNews();
 $res2 = $newsObj->getCarC();
 $res3 = $newsObj->getCarD();
 $res4 = $newsObj->getCarE();
 $res5 = $newsObj->getCarP();
 $res6 = $newsObj->getCarR();
 $res7 = $newsObj->getCarB();
 $res8 = $newsObj->getCarJ();
 $res9 = $newsObj->getCarG();
 $res10 = $newsObj->getCarS();
 
 $d=strtotime("tomorrow");
  
?>
<!DOCTYPE html>
<html>
<head>
  <title>Rental Wise</title>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" href="w3/w3.css" />
  <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
  <link href="assets/font-awesome-4.5.0/css/font-awesome.css" rel="stylesheet" />
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="../js/bootstrap-datepicker.js"></script>
  <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>
    <script type="text/javascript">
    $(function () {
        var dateNow = new Date();
        $('#datetimepicker1').datetimepicker({
            defaultDate:dateNow
        });
    });
</script>


 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCFEL75cUm9HVhJVDBA4yYejF-ujGurmA&libraries=places&callback=initAutocomplete"
        async defer></script>
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
  .price{ position: absolute; top: 0px; padding-left: 3px;}
  a{ text-decoration: none !important;}
  .crop{ height: 250px; overflow: hidden; }
  .crop img{ height: auto;}
  .glyphicon-map-marker{color:#8B0000;}
  
  input[type="date"]:not(.has-value):before{
      color: lightgrey;
      content: attr(placeholder);
    }
  
  </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50" class="w3-light-grey" id="myPage">
<div class="container w3-white" >
   
<?php include_once('Navbar.htm'); ?>
<div id="section1" class="container-fluid w3-border-bottom" style="background-image: url(image/jaguar.jpg);" >
 <div class="container-fluid">  
<div class="row">
    <div class="w3-padding-24 w3-center w3-content">
               <h2 class="w3-text-white w3-xxlarge  w3-hide-small">Affordable vehicle rentals *****!</h2>
               <p class="w3-xlarge w3-text-white  w3-hide-small">Direct from the public to the public >>>> </p>
    
     <div class="container-fluid w3-white w3-padding w3-light-grey">
          <!-- Search Form - START -->
          <form class="w3-left-align" action="SearchSP.php" method="GET"><span class="w3-large">Quick Search: </span><input type="submit" name="city" value="Durban" class="w3-btn w3-blue"
          /> <input type="submit" class="w3-btn w3-blue w3-card-2" name="city" value="Cape Town" />
          <input type="submit" class="w3-btn w3-blue w3-card-2" name="city" value="Johannesburg" /></form><br />
          
          <!-- Search Form - Starts -->
          <form name="addressField" class="form-inline w3-left-align" role="form" action="SearchResult.php" method="get">
            <div class="form-group">
              <input id="autocomplete" placeholder="City/Town"
             onFocus="geolocate()" name="city"  type="text" class="form-control" />
            </div>
            &nbsp;
            <div class="form-group">
            <div class="input-group date" id="datetimepicker1">
               <input  class="form-control" name="datetime1" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('2018-12-31'); ?>"  type="date"   id="datetimepicker1" />
               <span class="input-group-addon">
                  <span class="fa fa-calendar" ></span>
               </span>
            </div>
            </div>
            &nbsp;
            <div class="form-group">
            <div class="input-group date" id="datetimepicker3">
               <input  class="form-control" name="datetime2" value="<?php echo date('Y-m-d', $d); ?>" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('2018-12-31'); ?>"  type="date" id="date2" />
               <span class="input-group-addon">
                  <span class="fa fa-calendar" ></span>
               </span>
            </div>
            
            
            </div>
            <table id="address" style="display: none;">
              <tr>
                <td class="label">Street address</td>
                <td class="slimField"><input class="field" id="street_number" name="street_number"
                      disabled="true"></input></td>
                <td class="wideField" colspan="2"><input class="field" id="route" name="route"
                      disabled="true"></input></td>
              </tr>
              <tr>
                <td class="label">City</td>
                <!-- Note: Selection of address components in this example is typical.
                     You may need to adjust it for the locations relevant to your app. See
                     https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform
                -->
                <td class="wideField" colspan="2"><input class="field" id="locality" name="locality"
                      disabled="true"></input></td>
              </tr>
              <tr>
                <td class="label">State</td>
                <td class="slimField"><input class="field"
                      id="administrative_area_level_1" disabled="true"></input></td>
                <td class="label">Zip code</td>
                <td class="wideField"><input class="field" id="postal_code"
                      disabled="true"></input></td>
              </tr>
              <tr>
                <td class="label">Country</td>
                <td class="wideField" colspan="3"><input class="field" name="country"
                      id="country" disabled="true"></input></td>
              </tr>
            </table>
            <button type="submit" class="w3-btn  w3-amber w3-round ">
            <span class="glyphicon glyphicon-search"></span>
            Search</button>
          </form>
          <!-- Search Form - END -->
     </div>
               
    </div>
  <!-- <div id="auto" class="w3-half w3-margin-0">   
  </div> --> 
  </div></div>
</div>
</div>

<div id="section2" class="container w3-border-bottom">
  <div class="row w3-margin-top">
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
  <div class="item active">    
  <div class="col-md-4"> 
           <?php 
            while($row = mysqli_fetch_array($res3)){
            ?>
            <a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-indigo w3-xlarge">
            <div class="w3-card-2">
            <div class="w3-image crop">
            
             <img src="image/<?php echo $row['image'];  ?>" width="100%" alt="WTF"  /></div>
              <div class="price w3-teal w3-padding-right w3-padding-left"><?php  echo "R".$row['price']." /day"; ?>
             </div>
            <div class="w3-container w3-padding-top">
            <strong><?php echo $row['carMake']; ?> </strong></a><br /> 
            </div>
           <table class="w3-table w3-bordered w3-striped w3-border-top w3-border-amber" style="width: 250px;" >
           <tr>
              <td><img src="image/<?php echo $row['picture'];  ?>" class="img-circle" style="width: 100px; height: 100;" /> </td>
              <td class="w3-left-align"><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"> <strong><?php echo $row['name']; ?></strong></a> <br /><br />
              <span class="glyphicon glyphicon-map-marker w3-large"></span>  <?php 
               $reso = $newsObj->getLocation($row['pid']);
              echo $reso; ?> 
              </td>
           </tr> <?php  } ?></table>
            </div>
          
           <hr /> 
     </div>
    
  <div class="col-md-4"> 
           <?php 
            while($row = mysqli_fetch_array($res4)){
            ?>
            <a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-indigo w3-xlarge">
            <div class="w3-card-2">
            <div class="w3-image crop">
             
             <img src="image/<?php echo $row['image'];  ?>" width="100%" alt="WTF"  /></div>
             <div class="price w3-teal w3-padding-right w3-padding-left"><?php  echo "R".$row['price']." /day"; ?>
             </div>
            <div class="w3-container w3-padding-top">
            <strong><?php echo $row['carMake']; ?> </strong></a><br /> 
            </div>
           <table class="w3-table w3-bordered w3-striped w3-border-top w3-border-amber" style="width: 250px;" >
           <tr>
              <td><img src="image/<?php echo $row['picture'];  ?>" class="img-circle" style="width: 100px; height: 100;" /> </td>
              <td class="w3-left-align"><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"> <strong><?php echo $row['name']; ?></strong></a> <br /><br />
              <span class="glyphicon glyphicon-map-marker w3-large"></span>  <?php 
               $reso = $newsObj->getLocation($row['pid']);
              echo $reso; ?> 
              </td>
           </tr> <?php  } ?></table>
            </div>
          
           <hr /> 
     </div>
     <div class="col-md-4"> 
           <?php 
            while($row = mysqli_fetch_array($res5)){
            ?>
            <a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-indigo w3-xlarge">
            <div class="w3-card-2">
            <div class="w3-image crop">
             
             <img src="image/<?php echo $row['image'];  ?>" width="100%" alt="WTF"  />
             <div class="price w3-teal w3-padding-right w3-padding-left"><?php  echo "R".$row['price']." /day"; ?>
             </div>
             </div>
            <div class="w3-container w3-padding-top">
            <strong><?php echo $row['carMake']; ?> </strong></a><br /> 
            </div>
           <table class="w3-table w3-bordered w3-striped w3-border-top w3-border-amber" style="width: 250px;" >
           <tr>
              <td><img src="image/<?php echo $row['picture'];  ?>" class="img-circle" style="width: 100px; height: 100;" /> </td>
              <td class="w3-left-align"><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"> <strong><?php echo $row['name']; ?></strong></a> <br /><br />
              <span class="glyphicon glyphicon-map-marker w3-large"></span>  <?php 
               $reso = $newsObj->getLocation($row['pid']);
              echo $reso; ?> 
              </td>
           </tr> <?php  } ?></table>
            </div>  
           <hr /> 
           
     </div></div>
     
     
  <div class="item">    
  <div class="col-md-4"> 
           <?php 
            while($row = mysqli_fetch_array($res6)){
            ?>
            <a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-indigo w3-xlarge">
            <div class="w3-card-2">
            <div class="w3-image crop">
             
             <img src="image/<?php echo $row['image'];  ?>" width="100%" alt="WTF"  />
             
             <div class="price w3-teal w3-padding-right w3-padding-left"><?php  echo "R".$row['price']." /day"; ?>
             </div>
             </div>
            <div class="w3-container w3-padding-top">
            <strong><?php echo $row['carMake']; ?> </strong></a><br /> 
            </div>
           <table class="w3-table w3-bordered w3-striped w3-border-top w3-border-amber" style="width: 250px;" >
           <tr>
              <td><img src="image/<?php echo $row['picture'];  ?>" class="img-circle" style="width: 100px; height: 100;" /> </td>
              <td class="w3-left-align"><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"> <strong><?php echo $row['name']; ?></strong></a> <br /><br />
              <span class="glyphicon glyphicon-map-marker w3-large"></span>  <?php 
               $reso = $newsObj->getLocation($row['pid']);
              echo $reso; ?> 
              </td>
           </tr> <?php  } ?></table>
            </div>
          
           <hr /> 
     </div>
    
  <div class="col-md-4"> 
           <?php 
            while($row = mysqli_fetch_array($res2)){
            ?>
            <a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-indigo w3-xlarge">
            <div class="w3-card-2">
            <div class="w3-image crop">
             
             <img src="image/<?php echo $row['image'];  ?>" width="100%" alt="WTF"  />
             <div class="price w3-teal w3-padding-right w3-padding-left"><?php  echo "R".$row['price']." /day"; ?>
             </div>
             </div>
            <div class="w3-container w3-padding-top">
            <strong><?php echo $row['carMake']; ?> </strong></a><br /> 
            </div>
           <table class="w3-table w3-bordered w3-striped w3-border-top w3-border-amber" style="width: 250px;" >
           <tr>
              <td><img src="image/<?php echo $row['picture'];  ?>" class="img-circle" style="width: 100px; height: 100px;" /> </td>
              <td class="w3-left-align"><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"> <strong><?php echo $row['name']; ?></strong></a> <br /><br />
              <span class="glyphicon glyphicon-map-marker w3-large"></span>  <?php 
               $reso = $newsObj->getLocation($row['pid']);
              echo $reso; ?> 
              </td>
           </tr> <?php  } ?></table>
            </div>
          
           <hr /> 
     </div>
    <div class="col-md-4"> 
           <?php 
            while($row = mysqli_fetch_array($res7)){
            ?>
            <a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-indigo w3-xlarge">
            <div class="w3-card-2">
            <div class="w3-image crop">
             
             <img src="image/<?php echo $row['image'];  ?>" width="100%" alt="WTF"  />
             <div class="price w3-teal w3-padding-right w3-padding-left"><?php  echo "R".$row['price']." /day"; ?>
             </div>
             </div>
            <div class="w3-container w3-padding-top">
            <strong><?php echo $row['carMake']; ?> </strong></a><br /> 
            </div>
           <table class="w3-table w3-bordered w3-striped w3-border-top w3-border-amber" style="width: 250px;" >
           <tr>
              <td><img src="image/<?php echo $row['picture'];  ?>" class="img-circle" style="width: 100px; height: 100px;" /> </td>
              <td class="w3-left-align"><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"> <strong><?php echo $row['name']; ?></strong></a> <br /><br />
              <span class="glyphicon glyphicon-map-marker w3-large"></span>  <?php 
               $reso = $newsObj->getLocation($row['pid']);
              echo $reso; ?> 
              </td>
           </tr> <?php  } ?></table>
            </div>
          
           <hr /> 
     </div></div>
     
   <div class="item">    
  <div class="col-md-4"> 
           <?php 
            while($row = mysqli_fetch_array($res8)){
            ?>
            <a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-indigo w3-xlarge">
            <div class="w3-card-2">
            <div class="w3-image crop">
             
             <img src="image/<?php echo $row['image'];  ?>" width="100%" alt="WTF"  />
             <div class="price w3-teal w3-padding-right w3-padding-left"><?php  echo "R".$row['price']." /day"; ?>
             </div>
             
             </div>
            <div class="w3-container w3-padding-top">
            <strong><?php echo $row['carMake']; ?> </strong></a><br /> 
            </div>
           <table class="w3-table w3-bordered w3-striped w3-border-top w3-border-amber" style="width: 250px;" >
           <tr>
              <td><img src="image/<?php echo $row['picture'];  ?>" class="img-circle" style="width: 100px; height: 100;" /> </td>
              <td class="w3-left-align"><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"> <strong><?php echo $row['name']; ?></strong></a> <br /><br />
              <span class="glyphicon glyphicon-map-marker w3-large"></span>  <?php 
               $reso = $newsObj->getLocation($row['pid']);
              echo $reso; ?> 
              </td>
           </tr> <?php  } ?></table>
            </div>
          
           <hr /> 
     </div>
    
  <div class="col-md-4"> 
           <?php 
            while($row = mysqli_fetch_array($res10)){
            ?>
            <a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-indigo w3-xlarge">
            <div class="w3-card-2">
            <div class="w3-image crop">
             
             <img src="image/<?php echo $row['image'];  ?>" width="100%" alt="WTF"  />
             <div class="price w3-teal w3-padding-right w3-padding-left"><?php  echo "R".$row['price']." /day"; ?>
             </div>
             </div>
            <div class="w3-container w3-padding-top">
            <strong><?php echo $row['carMake']; ?> </strong></a><br /> 
            </div>
           <table class="w3-table w3-bordered w3-striped w3-border-top w3-border-amber" style="width: 250px;" >
           <tr>
              <td><img src="image/<?php echo $row['picture'];  ?>" class="img-circle" style="width: 100px; height: 100;" /> </td>
              <td class="w3-left-align"><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"> <strong><?php echo $row['name']; ?></strong></a> <br /><br />
              <span class="glyphicon glyphicon-map-marker w3-large"></span>  <?php 
               $reso = $newsObj->getLocation($row['pid']);
              echo $reso; ?> 
              </td>
           </tr> <?php  } ?></table>
            </div>
          
           <hr /> 
     </div>
  <div class="col-md-4"> 
           <?php 
            while($row = mysqli_fetch_array($res9)){
            ?>
            <a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-indigo w3-xlarge">
            <div class="w3-card-2">
            <div class="w3-image crop">
             
             <img src="image/<?php echo $row['image'];  ?>" width="100%" alt="WTF"  />
             <div class="price w3-teal w3-padding-right w3-padding-left"><?php  echo "R".$row['price']." /day"; ?>
             </div>
             
             </div>
            <div class="w3-container w3-padding-top">
            <strong><?php echo $row['carMake']; ?> </strong></a><br /> 
            </div>
           <table class="w3-table w3-bordered w3-striped w3-border-top w3-border-amber" style="width: 250px;" >
           <tr>
              <td><img src="image/<?php echo $row['picture'];  ?>" class="img-circle" style="width: 100px; height: 100;" /> </td>
              <td class="w3-left-align"><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"> <strong><?php echo $row['name']; ?></strong></a> <br /><br />
              <span class="glyphicon glyphicon-map-marker w3-large"></span>  <?php 
               $reso = $newsObj->getLocation($row['pid']);
              echo $reso; ?> 
              </td>
           </tr> <?php  } ?></table>
            </div>
          
           <hr /> 
     </div></div>
      <!-- Controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" ></span>
        <span class="sr-only">Next</span>
      </a> 
     </div>
     </div>
  </div>
</div>
<div id="section3" class="container w3-border-bottom w3-light-grey">
  <div class="w3-row-padding">
    <div class="col-md-2"> &nbsp;</div>
     <div class="col-md-4"> 
        <div class="w3-padding">
         <h2>Rent Your Car Out</h2>
         <p>Use your car to earn additional income
         using our secure and reliable platform that will
         protect you and your car.
         </p>
         <p><a class="w3-btn w3-blue" href="addNews.php? id=<?php echo mt_rand(); ?>">List A Car</a></p>
        </div>
     </div>
     <div class="col-md-4"> 
        <div class="w3-padding">
         <h2>Rent A Car</h2>
         <p>Use your car to earn additional income
         using our secure and reliable platform that will
         protect you and your car.
         </p>
         <p><a class="w3-btn w3-teal" href="addNews.php ? id=<?php echo mt_rand(); ?>">Rent A Car</a></p>
        </div>
     </div> 
     <div class="col-md-2"> &nbsp;</div>  
  </div>
</div>
<!--  -->
<div id="section41" class="container w3-border-bottom">
  <h3 class="w3-black w3-padding w3-round-xlarge"><strong>We keep you safe :</strong> </h3>
  <div class="w3-row-padding">
    
    <div class="w3-quarter">
        <div class="w3-margin-right">
           <img src="image/safe.jpg" class="w3-circle" />
        </div> 
    </div>
    <div class="col-md-4">
         <div class="w3-padding">
         <h4>Your car safety is our first priority:</h4>
         <hr />
         <p><strong>Car Owner :</strong></p>
         <p>We've set a plan that will protect you and your car
         while it's on the renter hands.
         </p>
         <p><a class="w3-btn w3-blue" href="#">See Details...</a></p>
        </div>
    </div>
     <div class="col-md-4"> 
        <div class="w3-padding">
         <h4>Renter we also keep you covered:</h4>
         <hr />
         <p><strong>Car Renter :</strong></p>
         <p>We also have a dedicated team to assist and protect you as a 
          renter while the car is in your hands.
         </p>
         <p><a class="w3-btn w3-blue" href="#">See Details...</a></p>
        </div>
     </div> 
     <div class="col-md-2"> &nbsp;</div>  
  </div>
</div>
<?php include_once('footer.htm'); ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#auto').load('load.php');
    refresh();
    
  });
  function refresh(){
    setTimeout(function(){
        $('#auto').fadeOut(300).load('load.php').fadeIn(200);
        refresh();
    },20000);
  }
</script>  
</body>

</html>
