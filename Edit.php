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
$search = "";
$Errsearch= "";
if(isset($_POST['submit'])){
    if(empty($_POST['search'])){
        $Errsearch = "Headline required";
        header("Location: edit.php");
        
    } else {
       $search = test_input($_POST['search']);
    }
}
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
   <br />/<br /><br />
   <div class="container">
   <br />
   <div class="w3-right">
   <form method="post" class="form-inline" role="form"  action="SearchResult.php">
    <div class="form-group">
      <input id="search" class="form-control" placeholder="search with headline" name="search" type="text" />
      <button class="w3-btn w3-round-xxlarge"  type="button" name="submit">Search</button>
    </div></form>
   </div>
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
          <td><a href="EditNews.php?id=<?php echo $row['nid'] ;?>">Edit</a></td>
       </tr>
       <?php } ?>
       </tbody>
   </table>
   </div>
</body>
</html>