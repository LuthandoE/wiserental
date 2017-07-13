<?php
//ob_start();
//session_start();
//if( isset($_SESSION['user'])!="" ){
//	header("Location: SignIn.php");
//}
require_once ('News.php');

       $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
       
        $c = '';
        $result = mysqli_query($conn,"SELECT location FROM city 
                  ORDER BY location ");
        while ($row = mysqli_fetch_array($result)){
        	
        		$c .='<option>'.$row['location'].'</option>';
       	 }
         
         if (isset($_POST['btn-signup'])) {
            
            $email = test_input($_POST['email']);
          
            if (strlen($_POST['pass']) < 8) {
                    $errTyp = "danger";
                    $errMSG = "Password too short!";
                    
               
             } else  if (!preg_match("#[a-zA-Z]+#", $_POST['pass'])) {
                        $errTyp = "danger";
                        $errMSG = "Password must include at least one letter!";
                        
              } else  if ($_POST['pass'] != $_POST['pass_con']) {
                        $errTyp = "danger";
                        $errMSG = "Password doesn't match!";
              } 
              
              else if (!preg_match("#[0-9]+#", $_POST['pass'])){ 
                        $errTyp = "danger";
                        $errMSG = "Password must include at least one number!";
              } else {
                    if (!preg_match("/^[a-zA-Z ]*$/",$_POST['fname'])) {
                        $errTyp = "danger";
                        $errMSG = "Only letters and white space allowed for username"; 
                    } 
                    else {
                        $name = test_input($_POST['fname']);
                        $surname = test_input($_POST['lname']);
                        $phone = test_input($_POST['phone']);
                        $email = test_input($_POST['email']);
                       // $pid = test_input($_POST['city_name']);
                        $upass = test_input($_POST['pass']);
                        $image = test_input( $_FILES['image']['name']);
                        $number = $_POST["street_number"];  
                        $street = test_input($_POST["route"]);
                        $town = test_input($_POST["locality"]);
                        $country = test_input($_POST["country"]);
                        
                        
                        $name = filter_var($name, FILTER_SANITIZE_STRING);
                        $surname = filter_var($surname, FILTER_SANITIZE_STRING);
                        $phone = filter_var($phone, FILTER_SANITIZE_STRING);
                       // $pid = filter_var($pid, FILTER_SANITIZE_STRING);
                        $email = filter_var($email, FILTER_SANITIZE_STRING);
                        $upass = filter_var($upass, FILTER_SANITIZE_STRING);
                        $image = filter_var($image, FILTER_SANITIZE_STRING);
                            
                        $name = $conn->real_escape_string($name);
                        $surname = $conn->real_escape_string($surname);
                        $email = $conn->real_escape_string($email);
                        $phone = $conn->real_escape_string($phone);
                       // $pid = $conn->real_escape_string($pid);
                        $upass = $conn->real_escape_string($upass);
                        $number = $conn->real_escape_string($number);
                        $street = $conn->real_escape_string($street);
                        $town = $conn->real_escape_string($town);
                        $country = $conn->real_escape_string($country); 
                        $image = $conn->real_escape_string($image);
                        
                        
                      /*  $result = mysqli_query($conn,"SELECT pid FROM city WHERE location ='$pid'");
                        while($row = mysqli_fetch_array($result)){
                            $pid = $row['pid'];
                        }*/
                        
                        $tmp_dir = $_FILES['image']['tmp_name'];
                		$imgSize = $_FILES['image']['size'];
                        
                        $upload_dir = 'image/'; // upload directory
                
                	
                	    $imgExt = strtolower(pathinfo($image,PATHINFO_EXTENSION)); // get image extension
                		
                		// valid image extensions
                		$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
                		
                		// rename uploading image
                		$image = rand(1000,1000000).".".$imgExt;
                 	    // allow valid image file formats
                		if(in_array($imgExt, $valid_extensions)){			
                				// Check file size '5MB'
                				if($imgSize < 5000000)				{
                					move_uploaded_file($tmp_dir,$upload_dir.$image);
                				}
                				else{
                					echo  "<script>alert('Sorry, your file is too large.')</script>";
                				}
                			}
                			else{
                				echo  "<script> alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";		
                			}
                        
                        // password encrypt using SHA256();
                        //$password = hash('sha256', $upass);
                         
                        $query = "SELECT email FROM users WHERE email=?";
                        $stmt = $conn->prepare($query);
                        $stmt -> bind_param("s",$email);
                        //$result = $conn->query($query);
                        $stmt ->execute();
                        $stmt -> store_result();
                       // $count = mysqli_num_rows($result); 
                       // if email not found then proceed

                 if ($stmt-> num_rows == 0) {   
                 
                $loc = $conn->prepare("INSERT INTO city (street_number,route,location, country) VALUES (?, ?, ? , ?)");
                $loc->bind_param("ssss",$number,$street,$town,$country);
                $loc->execute();
                $last_id = $conn->insert_id;
                 
                $stmt = $conn->prepare("INSERT INTO users (name, surname,email,pid,
                 phone, pass,picture,created_on) 
                        VALUES (?, ?, ?, ?,?, ?, ? ,NOW())");
      
                $stmt->bind_param("sssssss", $name, $surname, $email, $last_id ,$phone,$upass,$image);
                $res = $stmt->execute();   

                if ($res) {
                    $errTyp = "success";
                    $errMSG = "You've successfully registered, you may <a href= 'admin.php' class='w3-text-blue'> login now </a>>>> ";
                
                    $to = $email;
                    $subject = "SignUp | Verification";
                    $messeg = "
                       Thanks for signing up! '<br/>'
                       Your account has been created, you can login after you have activated your account by pressing the url below. '<br/>'
                       
                       Please click the link to activate your account: 
                       
                     <a> https://rentalwise.000webhostapp.com/verification.php?email='.$email.'&upass='.$upass.' </a>
                        
                               ";
                    $headers = 'From: noreplywebsite.com';
                    mail($to, $subject, $messeg, $headers );
                
                } else {
                    $errTyp = "danger";
                    $errMSG = "Something went wrong, try again later...";
                }

            } else {
                $errTyp = "warning";
                $errMSG = "Sorry Email already in use ...";
          }
          $stmt->close();
          $conn->close();
              }    
          }
                 
     }

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Register</title>
   <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" href="w3/w3.css" />
  <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
  <link href="assets/font-awesome-4.5.0/css/font-awesome.css" rel="stylesheet" />
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
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


 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCFEL75cUm9HVhJVDBA4yYejF-ujGurmA&libraries=places&callback=initAutocomplete"
        async defer></script>
  
  <style>
  
   label{ font-weight: normal !important;}
         #locationField, #controls {
        position: relative;
        width: 480px;
      }
      #autocomplete {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 99%;
      }
      .label {
        text-align: right;
        font-weight: bold;
        width: 100px;
        color: #303030;
      }
      #address {
        border: 1px solid #000090;
        background-color: #f0f0ff;
        width: 480px;
        padding-right: 2px;
      }
      #address td {
        font-size: 10pt;
      }
      .field {
        width: 99%;
      }
      .slimField {
        width: 80px;
      }
      .wideField {
        width: 200px;
      }
      #locationField {
        height: 20px;
        margin-bottom: 2px;
      }
  </style>
</head>
<body  >
     <?php include_once ("Navbar.htm") ?>
    <div class="container w3-padding-64">
      <div class="w3-center"><h1> 
          <span class="glyphicon glyphicon-check w3-text-blue"></span>  Registration</h1>
          <p>If already have an account, Please login <a href="admin.php?v=<?php echo mt_rand(); ?>">here</a></p>          
      <hr /><br />
      </div>
    <div class="w3-row-padding">
        <div class="w3-half">
           <div class="w3-card-2 w3-padding">
          
              <form method="post" autocomplete="off" enctype="multipart/form-data" >
           
            <?php
            if (isset($errMSG)) {
            
            ?>
				<div class="form-group">
            	<div class="alert alert-<?php echo ($errTyp == "success") ?"success" : $errTyp; ?>">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
            }
            ?>
            <div class="form-group">
                <p>Required fields. <span class="w3-text-red">*</span></p>
            </div>
            <div class="form-group">
                <hr />
            </div>
            
            <table class="w3-table">
                <tr><td> <div class="form-group">
                <label class="w3-label w3-text-black">First Name: <span class="w3-text-red">*</span></label>
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="fname" class="form-control" placeholder="Enter First Name" required="" />
                </div>
            </div></td>
            
                <td><div class="form-group">
                <label class="w3-label w3-text-black">Last Name: <span class="w3-text-red">*</span></label>
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
            	<input type="text" name="lname" class="form-control" placeholder="Enter Last Name" required="" />
                </div>
            </div></td></tr>
                
                
                <tr><td> <div class="form-group">
                <label class="w3-label w3-text-black">Email Address: <span class="w3-text-red">*</span></label>
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="text" name="email" class="form-control" placeholder="Enter Your Email" required="" />
                </div>
            </div></td>
            
            <td> <div class="form-group">
                <label class="w3-label w3-text-black">Phone No. : <span class="w3-text-red">*</span></label>
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
            	<input type="text" name="phone" class="form-control" placeholder="Enter Your Phone Number" required="" />
                </div>
            </div></td></tr>
            <tr></tr>
                
            </table>
            <div class="w3-padding">
                <div class="form-group">
                <label class="w3-label w3-text-black">Your Picture :</label>
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-picture"></span></span>
                <input class="form-control" name="image" required="" type="file"/>
                </div>
                <hr />
            </div>
            </div>
           </div>
        </div>
        
        <!-- Second Half -->
        <div class="w3-half">
    <!----------------------------------------------------------- -->
        
    <div class="w3-card-2 w3-padding ">
       <label>Enter the street number, name and suburb and then select it from the drop down list that appears:</label>
       <div class="form-group w3-margin-top">
      	   <div id="locationField" class="input-group">
              <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker w3-large"></span></span> 
                 <input id="autocomplete" placeholder="320 Anton Lembede Street, Durban, South Africa"
                 onFocus="geolocate()"   type="text" class="form-control" />
              </div>
       </div>
    <table id="address">
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
    <!----------------------------------- -------------------------------- -->
        
            <div class="form-group">
                <label class="w3-label w3-text-black">Password: <span class="w3-text-red">*</span></label>
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Enter Password" required="" />
                </div>
            </div>
                  
            <div class="form-group">
                <label class="w3-label w3-text-black">Confirm Password: <span class="w3-text-red">*</span></label>
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass_con" class="form-control" placeholder="Confirm Password" required="" />
                </div>
            </div>
            
            <div class="form-group">
   	         <hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
            </div>
            
            <div class="form-group">
   	         <hr />
            </div>
            
            </div>
            </div>
        </div>
          
         </form>         
        </div><hr />
    </div>
       
      </div>

</body>
</html>