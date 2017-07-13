<?php
ob_start();
session_start();

require_once('config.php');
require_once('error_handler.php');
require_once('News.php');



 if( !isset($_SESSION['user']) ) {
	header("Location: index.php");
	exit;
}
$news = new News();
$resSess = $news->getUserID($_SESSION['user']);
$use_row = mysqli_fetch_array($resSess);

$display = $news->editNews($_SESSION['user']);

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/w3.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css"/>
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>

<body>
   <?php include_once("Nav.htm"); ?>
   <br /><br />
   <div class="container">
        <br />
        <div class="w3-center"><h1>Delete News</h1><hr /></div>
           <table class="table table-striped">
       <thead>
          <tr>
          <th>#ID</th>
          <th>Headline</th>
          <th>Date</th>
       </tr>
       </thead>
       <tbody id="body1">
          <tr>
          <?php while($row = mysqli_fetch_array($display)){ ?>
          <td><?php echo $row['nid'] ?></td>
          <td><?php echo $row['headline'] ?></td>
          <td><?php echo $row['posted_on'] ?></td>
          <td><a href="Delete.php?id=<?php echo $row['nid'] ;?>">Delete</a></td>
       </tr>
       <?php } ?>
       </tbody>
   </table>
        
   </div>
</body>
</html>