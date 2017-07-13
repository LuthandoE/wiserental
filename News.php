<?php
require_once('config.php');
require_once('lue_error_handler.php');
class News{
	
   private $mysqli;
   public function __construct(){
		
		$this->mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
		}
   public function __destruct(){
    
    
    
		
		$this->mysqli->close();
		}
   public function register($firstName,$lastName,$image,$phone,$locid, $email, $password){
            
        $firstName = $this ->mysqli->real_escape_string($firstName);
        $lastName = $this ->mysqli->real_escape_string($lastName);
        $image = $this ->mysqli->real_escape_string($image);
        $phone = $this ->mysqli->real_escape_string($phone);
        $locid = $this ->mysqli->real_escape_string($locid);
        $email = $this ->mysqli->real_escape_string($email);
        $password = $this ->mysqli->real_escape_string($password);
        
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
				if(($imgSize < 5000000) && (!empty($image)))				{
					move_uploaded_file($tmp_dir,$upload_dir.$image);
				}
				else{
					echo  "<script>alert('Sorry, your file is too large.')</script>";
				}
			}
			else{
				echo  "<script> alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";		
			}
            
            // check email exist or not
            $query = "SELECT email FROM users WHERE email='$email'";
            $result = mysqli_query($this->mysqli, $query);
            $count = mysqli_num_rows($result); // if email not found then proceed

            if ($count == 0) {

                 $query = "INSERT INTO users(name,surname,image, phone, pid,email,pass,created_on) 
                 VALUES('$firstName','$lastName','$image','$phone','$locid','$email','$password',NOW())";
                 $res = mysqli_query($this->mysqli, $query);   

                if ($res) {
                    $errTyp = "success";
                    $errMSG = "successfully registered, you may <a href= 'index.php' class='w3-text-blue'> login now </a>>>> ";
                } else {
                    $errTyp = "danger";
                    $errMSG = "Something went wrong, try again later...";
                }

            } else {
                $errTyp = "warning";
                $errMSG = "Sorry Email already in use ...";
          }
    }
    public function hire($hd){
        
        $query = "INSERT INTO hire (nid, userid)
                  SELECT nid, userid FROM vehicles WHERE nid = $hd";
        $res = $this->mysqli->query($query);
        return $res;
    }
    public function HireRequest($id){
        
      /*  $query = "SELECT vehicles.nid, vehicles.carMake, vehicles.image,
                        ,users.pid, users.name ,vehicles.period,users.phone,
                        vehicles.price,vehicles.model_year,
                      FROM vehicles INNER JOIN users ON vehicles.userid = users.userid 
                      WHERE vehicles.nid = '$id'"; */
        $query = "SELECT vehicles.carMake, vehicles.userid, vehicles.model_year, hire.status
                FROM hire INNER JOIN vehicles ON hire.nid = vehicles.nid 
                WHERE vehicles.nid = '$id'
                LIMIT 10";
        
        $res = $this->mysqli->query($query);
        return $res;
        
    }
   	public function getPhone($id){
	   
	    $id = $this ->mysqli->real_escape_string($id);
		$query = "SELECT phone FROM users WHERE userid='$id'";
        $res = $this->mysqli->query($query);
        
        while($row = mysqli_fetch_array($res)){
            $cat = $row['phone'];
        }
		return $cat;
	} 
	public function getEmail($id){
	   
	    $id = $this ->mysqli->real_escape_string($id);
		$query = "SELECT email FROM users WHERE userid='$id'";
        $res = $this->mysqli->query($query);
        
        while($row = mysqli_fetch_array($res)){
            $cat = $row['email'];
        }
		return $cat;
	}
	public function getCatID($cat){
	   
	    $cat = $this ->mysqli->real_escape_string($cat);
		$query = "SELECT catid FROM faq WHERE question='$cat'";
        $res = $this->mysqli->query($query);
        
        while($row = mysqli_fetch_array($res)){
            $cat = $row['catid'];
        }
		return $cat;
	} 
	public function editCat($id){
	   
	    $id = $this ->mysqli->real_escape_string($id);
		$query = "SELECT location FROM city WHERE pid='$id'";
        $res = $this->mysqli->query($query);
        
        while($row = mysqli_fetch_array($res)){
            $cat = $row['location'];
        }
		return $cat;
	} 
   	public function getCo($id){
	   
	    $id = $this ->mysqli->real_escape_string($id);
		$query = "SELECT country FROM city WHERE pid='$id'";
        $res = $this->mysqli->query($query);
        
        while($row = mysqli_fetch_array($res)){
            $cat = $row['country'];
        }
		return $cat;
	}
    public function deleteNews($id){
       
       $id = $this ->mysqli->real_escape_string($id);
        $query = "Delete FROM vehicles
                WHERE nid IN ($id)";
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function search($city,$period){
        
        //$city = $this ->mysqli->real_escape_string($city);
        
        $query = "SELECT vehicles.nid, vehicles.carMake, vehicles.image,
                        vehicles.posted_on, users.pid, users.name ,vehicles.period,
                        vehicles.price,vehicles.model_year,vehicles.aut_manuel
                      FROM vehicles INNER JOIN users ON vehicles.userid = users.userid 
                      WHERE users.pid = '$city' AND vehicles.period > '$period'  ";
                      
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function viewCar($vehicle_id){
        $query = "SELECT vehicles.nid, vehicles.carMake,vehicles.description, vehicles.image,
                        vehicles.posted_on,users.created_on,vehicles.price, users.pid,users.picture, users.name ,vehicles.period,
                        vehicles.price,vehicles.model_year,vehicles.aut_manuel
                      FROM vehicles INNER JOIN users ON vehicles.userid = users.userid 
                      WHERE vehicles.nid = '$vehicle_id'";
        $re = $this->mysqli->query($query);
        return $re;
    }
    public function getLocationID($location){
        
       // $loc = $this ->mysqli->real_escape_string($loc);
		$query = "SELECT pid FROM city WHERE location ='$location'";
        $res = $this->mysqli->query($query);
        
        while($row = mysqli_fetch_array($res)){
           $pid = $row['pid'];
        }
		return $pid; 
    }
    public function userName($id){
        
       // $loc = $this ->mysqli->real_escape_string($loc);
		$query = "SELECT name FROM users WHERE userid ='$id'";
        $res = $this->mysqli->query($query);
        
        while($row = mysqli_fetch_array($res)){
           $name = $row['name'];
        }
		return $name; 
    }
	public function catToEd($id){
	   
        $id = $this ->mysqli->real_escape_string($id);
		$query = "SELECT question FROM faq WHERE catid='$id'";
        $res = $this->mysqli->query($query);
        
        while($row = mysqli_fetch_array($res)){
            $cat = $row['question'];
        }
		return $cat;
	}
    public function getUserID($id){
        
        $id = $this ->mysqli->real_escape_string($id);
        $query = "SELECT * FROM users WHERE userid=$id";
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function getUsername($username){
        
        $username = $this ->mysqli->real_escape_string($username);
        $query = "SELECT userid, email, pass FROM users WHERE email = '$username'";
        $result = $this->mysqli->query($query);
        return $result;
        
    }
    public function GetCat(){
		$query = "SELECT question FROM faq";
		$result = $this->mysqli->query($query);
        return $result;
		
		}
	//Populating dropdown sub faq
	public function GetCity(){
		$query = "SELECT location FROM city 
                  ORDER BY location ";
		$result = $this->mysqli->query($query);
        return $result;
		
		}
        
 	public function getLocation($pid){
		$query = "SELECT location FROM city 
                  WHERE pid = '$pid'";
       	
          $result = $this->mysqli->query($query);

        while($row = mysqli_fetch_array($result)){
            $pid = $row['location'];
        }
		return $pid;
  }
	//Getting a sub faq id 
	public function getSubID($pid){  
		
        $pid = $this ->mysqli->real_escape_string($pid);
		$q = "SELECT pid FROM city WHERE location ='$pid'";
        $result = $this->mysqli->query($q);

        while($row = mysqli_fetch_array($result)){
            $pid = $row['pid'];
        }
		return $pid;
	}
    
    //Getting a sub faq id 
	public function getID($nid){  
		$nid = $this ->mysqli->real_escape_string($nid);
		$q = "SELECT pid FROM vehicles WHERE nid ='$nid'";
        $result = $this->mysqli->query($q);

        while($row = mysqli_fetch_array($result)){
            $pid = $row['pid'];
        }
		return $pid;
	}
    public function getTopNews($id){
        
        $id = $this ->mysqli->real_escape_string($id);
        $query = "SELECT vehicles.nid, vehicles.carMake, vehicles.image,vehicles.posted_on,city.location
                  FROM vehicles INNER JOIN city ON vehicles.pid = city.pid 
                  WHERE vehicles.catid = 1 AND city.pid = $id ORDER BY vehicles.posted_on
                  DESC LIMIT 6";
                  
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function tobEidted($id){
        
        $id = $this ->mysqli->real_escape_string($id);
        $query = "SELECT nid, carMake,news, image,posted_on,pid, catid
                  FROM vehicles  
                  WHERE nid = $id";
        $result = $this->mysqli->query($query);
        return $result;
    }

    public function updateNews($newsid, $faq,$sub_faq,$article,$image,$carMake,$userid,$btn){
        
        $newsid = $this ->mysqli->real_escape_string($newsid);
        $faq = $this ->mysqli->real_escape_string($faq);
        $sub_faq = $this ->mysqli->real_escape_string($sub_faq);
        $article = $this ->mysqli->real_escape_string($article);
        $carMake = $this ->mysqli->real_escape_string($carMake);
        $userid = $this ->mysqli->real_escape_string($userid);
        
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
				if(($imgSize < 5000000) && (!empty($image)))				{
					move_uploaded_file($tmp_dir,$upload_dir.$image);
				}
				else{
					echo  "<script>alert('Sorry, your file is too large.')</script>";
				}
			}
			else{
				echo  "<script> alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";		
			}
         
        $query = "UPDATE vehicles SET news = '".$article."',image= '".$image."', posted_on = NOW(),
                         carMake = '".$carMake."', catid= '".$faq."' ,
                         pid = '".$sub_faq."', userid = '".$userid."' WHERE nid = '".$newsid."'";
        try{
        if ($this->mysqli->query($query) === TRUE) {
            echo  "<script>
                        alert('Article has been successfully updated');
                    </script>";
                    header("Location:edit.php");
          
        } else {
            echo   "<script>  alert('". "Error: " . $query . "<br>" .$this->mysqli->error ."') </script>";
        }
        }catch(exception $e){
            echo   "<script>  alert('". "Error: " .$e->getMessage() ."') </script>";
        }
    }
	public function post($desc, $make,$price,$image,$period,$userid,$btn){
	    
        $make = $this ->mysqli->real_escape_string($make);
        $price = $this ->mysqli->real_escape_string($price);
        //$image = $this ->mysqli->real_escape_string($image);
        $userid = $this ->mysqli->real_escape_string($userid);
        $period = $this ->mysqli->real_escape_string($period);
        $desc = $this ->mysqli->real_escape_string($desc);
        
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
            
     // $this->mysqli->query("INSERT INTO cat (catid, pid) VALUES('".$faq."','".$sub_faq."')");
	//	$catid  =$this->mysqli->insert_id;
		
	    $sql = "INSERT INTO vehicles (description, carMake ,period, image, price, posted_on, userid)
               VALUES('".$desc."','".$make."','".$period."','".$image."',
               '".$price."',NOW(),'".$userid."')";
        try{
        if ($this->mysqli->query($sql) === TRUE) {
            echo  "<script>
                        alert('Your car has been successfully listed');
                    </script>";
          
        } else {
            echo   "<script>  alert('". "Error: " . $sql . "<br>" .$this->mysqli->error ."') </script>";
        }
		} catch(Exception $e){
		     echo "<script>
                        alert('An error has occured while trying to add article');
                    </script>".$e->getMessage();
		}
        	
	}
    public function getNews(){
        $query = "SELECT vehicles.nid, vehicles.carMake, vehicles.price,
                    vehicles.period, vehicles.image,vehicles.posted_on,
                    users.pid, users.name, users.picture
                    
                  FROM vehicles INNER JOIN users ON vehicles.userid = users.userid 
                  WHERE  users.pid = 10 ORDER BY vehicles.posted_on
                  DESC LIMIT 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function editNews($id){
        
        $id = $this ->mysqli->real_escape_string($id);
        $query = "SELECT nid, carMake,posted_on
                  FROM vehicles  
                  WHERE userid = $id ORDER BY posted_on
                  DESC LIMIT 30";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function getCar(){
        $query = "SELECT vehicles.nid, vehicles.carMake, vehicles.price,
                    vehicles.period, vehicles.image,vehicles.posted_on,
                    users.pid, users.name, users.picture
                    
                  FROM vehicles INNER JOIN users ON vehicles.userid = users.userid 
                  WHERE  users.pid = 1 ORDER BY vehicles.posted_on
                  DESC LIMIT 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function getCarC(){
        $query = "SELECT vehicles.nid, vehicles.carMake, vehicles.price,
                    vehicles.period, vehicles.image,vehicles.posted_on,
                    users.pid, users.name, users.picture
                    
                  FROM vehicles INNER JOIN users ON vehicles.userid = users.userid 
                  WHERE  users.pid = 1 ORDER BY vehicles.posted_on
                  DESC LIMIT 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function getVehicle($userid){
        
        $query = "SELECT vehicles.nid, vehicles.carMake, vehicles.period,
                vehicles.posted_on, users.userid
                
                FROM vehicles INNER JOIN users ON vehicles.userid = users.userid
                 WHERE users.userid =". $userid;
         $result = $this->mysqli->query($query);
        return $result;         
        
    }
        public function getCarB(){
        $query = "SELECT vehicles.nid, vehicles.carMake, vehicles.price,
                    vehicles.period, vehicles.image,vehicles.posted_on,
                    users.pid, users.name, users.picture
                    
                  FROM vehicles INNER JOIN users ON vehicles.userid = users.userid 
                  WHERE  users.pid = 2 ORDER BY vehicles.posted_on
                  DESC LIMIT 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
        public function getCarD(){
        $query = "SELECT vehicles.nid, vehicles.carMake, vehicles.price,
                    vehicles.period, vehicles.image,vehicles.posted_on,
                    users.pid, users.name, users.picture
                    
                  FROM vehicles INNER JOIN users ON vehicles.userid = users.userid 
                  WHERE  users.pid = 3 ORDER BY vehicles.posted_on
                  DESC LIMIT 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    
   public function getUser($userid){
    
      $query = "SELECT users.name, users.surname, 
                users.picture ,users.created_on, city.location
                FROM users  INNER JOIN city ON users.pid = city.pid
                WHERE users.userid=". $userid;
      
      $result = $this->mysqli->query($query);
      return $result;
     
   }
    public function getCarDurbs($id){
        $query = "SELECT vehicles.nid, vehicles.carMake, vehicles.price,
                    vehicles.period, vehicles.image,vehicles.posted_on,
                    users.pid, users.name, users.picture
                    
                  FROM vehicles INNER JOIN users ON vehicles.userid = users.userid 
                  WHERE  users.pid = 3 ORDER BY vehicles.posted_on
                  DESC LIMIT 5";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function getCarCPT($id){
        $query = "SELECT vehicles.nid, vehicles.carMake, vehicles.price,
                    vehicles.period, vehicles.image,vehicles.posted_on,
                    users.pid, users.name, users.picture
                    
                  FROM vehicles INNER JOIN users ON vehicles.userid = users.userid 
                  WHERE  users.pid = 1 ORDER BY vehicles.posted_on
                  DESC LIMIT 5";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function getCarGP($id){
        $query = "SELECT vehicles.nid, vehicles.carMake, vehicles.price,
                    vehicles.period, vehicles.image,vehicles.posted_on,
                    users.pid, users.name, users.picture
                    
                  FROM vehicles INNER JOIN users ON vehicles.userid = users.userid 
                  WHERE  users.pid = 5 AND users.pid = 4 ORDER BY vehicles.posted_on
                  DESC LIMIT 5";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function getCarJ(){
        $query = "SELECT vehicles.nid, vehicles.carMake, vehicles.price,
                    vehicles.period, vehicles.image,vehicles.posted_on,
                    users.pid, users.name, users.picture
                    
                  FROM vehicles INNER JOIN users ON vehicles.userid = users.userid 
                  WHERE  users.pid = 5 ORDER BY vehicles.posted_on
                  DESC LIMIT 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
        public function getCarR(){
        $query = "SELECT vehicles.nid, vehicles.carMake, vehicles.price,
                    vehicles.period, vehicles.image,vehicles.posted_on,
                    users.pid, users.name, users.picture
                    
                  FROM vehicles INNER JOIN users ON vehicles.userid = users.userid 
                  WHERE  users.pid = 9 ORDER BY vehicles.posted_on
                  DESC LIMIT 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
        public function getCarG(){
        $query = "SELECT vehicles.nid, vehicles.carMake, vehicles.price,
                    vehicles.period, vehicles.image,vehicles.posted_on,
                    users.pid, users.name, users.picture
                    
                  FROM vehicles INNER JOIN users ON vehicles.userid = users.userid 
                  WHERE  users.pid = 4 ORDER BY vehicles.posted_on
                  DESC LIMIT 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
        public function getCarS(){
        $query = "SELECT vehicles.nid, vehicles.carMake, vehicles.price,
                    vehicles.period, vehicles.image,vehicles.posted_on,
                    users.pid, users.name, users.picture
                    
                  FROM vehicles INNER JOIN users ON vehicles.userid = users.userid 
                  WHERE  users.pid = 8 ORDER BY vehicles.posted_on
                  DESC LIMIT 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
        public function getCarE(){
        $query = "SELECT vehicles.nid, vehicles.carMake, vehicles.price,
                    vehicles.period, vehicles.image,vehicles.posted_on,
                    users.pid, users.name, users.picture
                    
                  FROM vehicles INNER JOIN users ON vehicles.userid = users.userid 
                  WHERE  users.pid = 6 ORDER BY vehicles.posted_on
                  DESC LIMIT 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
        public function getCarP(){
        $query = "SELECT vehicles.nid, vehicles.carMake, vehicles.price,
                    vehicles.period, vehicles.image,vehicles.posted_on,
                    users.pid, users.name, users.picture
                    
                  FROM vehicles INNER JOIN users ON vehicles.userid = users.userid 
                  WHERE  users.pid = 7 ORDER BY vehicles.posted_on
                  DESC LIMIT 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function getCelebNews1(){
        $query = "SELECT vehicles.nid, vehicles.carMake, vehicles.image,vehicles.posted_on,users.pid
                  FROM vehicles INNER JOIN users ON vehicles.userid = users.userid 
                  WHERE  users.pid = 1 ORDER BY vehicles.posted_on
                  DESC LIMIT 1 OFFSET 2";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function getNewsID($newsID){
        
        $newsID = $this ->mysqli->real_escape_string($newsID);
        $query = "SELECT vehicles.nid, vehicles.carMake, 
                  vehicles.description, vehicles.price, vehicles.period, vehicles.image,
                  vehicles.pick_drop_opt, vehicles.posted_on,users.pid, vehicles.vehicle_type,
                  vehicles.aut_manuel,
                  users.name, users.picture,users.created_on 
                  
                  FROM vehicles INNER JOIN users ON vehicles.userid = users.userid 
                  WHERE  vehicles.nid =".$newsID;
                    
       $result = $this->mysqli->query($query);
       return $result;  
    }

    public function getMtr(){
        $query = "SELECT vehicles.nid, vehicles.carMake, vehicles.image,vehicles.posted_on,users.pid
                  FROM vehicles INNER JOIN users ON vehicles.userid = users.userid 
                  WHERE users.pid = 3 ORDER BY vehicles.posted_on
                  DESC LIMIT 1  OFFSET 5";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function getMotoring(){
         $query = "SELECT vehicles.nid, vehicles.carMake, vehicles.image,vehicles.posted_on,users.pid
                  FROM vehicles INNER JOIN users ON vehicles.userid = users.userid 
                  WHERE users.pid = 3 ORDER BY vehicles.posted_on
                  DESC LIMIT 1  OFFSET 3";
        
        $result = $this->mysqli->query($query);
        return $result;
    }
    public function getMotorLaunches(){
        $query = "SELECT vehicles.nid, vehicles.carMake, vehicles.image,vehicles.posted_on,city.location
                  FROM vehicles INNER JOIN city ON vehicles.pid = city.pid 
                  WHERE vehicles.catid = 1 AND city.pid = 14 ORDER BY vehicles.posted_on
                  DESC LIMIT 1";
        
        $result = $this->mysqli->query($query);
        return $result;
    }

function humanTiming ($time){

    $time = time() - $time; // to get the time since that moment
    $time = ($time<1)? 1 : $time;
    $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

}
function dayCount($from, $to) {
    $first_date = strtotime($from);
    $second_date = strtotime($to);
    $offset = $second_date-$first_date; 
    return floor($offset/60/60/24);
}
    
}
?>
