<?php

require_once ('config.php');
require_once ('lue_error_handler.php');

class Chat
{
    private $mysqli;
   
    function __construct()
    {
        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    }
    function __destruct()
    {
        $this->mysqli->close();
    }
    public function fecth($email){
        
    }
    public function selectUser($sessn){
        $res = mysqli_query($this->mysqli, "SELECT * FROM users WHERE userid=".$sessn);
        mysqli_fetch_array($res);
    }
    public function login($email,$password,$msg){
        
         
        if (isset($_SESSION['user'])!="" ) {
		header("Location: Forum.php");
		exit;
	   }
        $query = "SELECT userid, username, pass FROM users WHERE email='$email'";
        $res= mysqli_query($this->mysqli, $query);
        $row=mysqli_fetch_array($res);
		
		$count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
		
		if( $count == 1 && $row['pass']==$password ) {
			$_SESSION['user'] = $row['userid'];
			header("Location: Forum.php");
		} else {
			$msg="";
		}
    }
    public function register($username, $email, $password){
            // check email exist or not
            $query = "SELECT email FROM users WHERE email='$email'";
            $result = mysqli_query($this->mysqli, $query);
            $count = mysqli_num_rows($result); // if email not found then proceed

            if ($count == 0) {

                 $query = "INSERT INTO users(username,email,pass,created_on) VALUES('$username','$email','$password',NOW())";
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
    //Register new user
   
    //Truncates() Delete messaqges in the db
  /*
    public function deleteAllMessage()
    {
        $query = 'TRUNCATE TABLE post';
        $result = $this->mysqli->query($query);
    } */
  /*  public function postNewMessage($user_name, $message, $color)
    {
        $user_name = $this->mysqli->real_escape_string($user_name);
        $message = $this->mysqli->real_escape_string($message);
        $userid = $this->mysqli->real_escape_string($color);

        $query = 'INSERT INTO post(posted_on,username,message,userid)' . ' VALUES(
     NOW(),
     "' . $user_name . '",
     "' . $message . '",
     "' . $color . '")';
        $result = $this->mysqli->query($query);
    } */
   /* public function getNewMessages($id = 0)
    {
        $id = $this->mysqli->real_escape_string($id);
        if ($id > 0) {
            $query = '
        SELECT postid,user_name,message,DATE_FORMAT(posted_on,"%H:%i%s")
        AS posted_on FROM chat WHERE postid>' . $id . 'ORDER BY postid ASC';
        } else {
            $query = '
         SELECT postid,userid,message,posted_on
         FROM(SELECT message_id,user_name,message,DATE_FORMAT(posted_on,"%H:%i%s")
         AS posted_on FROM chat ORDER BY postid DESC LIMIT 10)
         ORDER BY message_id ASC';
        }
        $result = $this->mysqli->query($query);


    } */
}

?>