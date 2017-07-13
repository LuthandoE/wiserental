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

$c = '';
$result = $news->GetCategory();
while ($row = mysqli_fetch_array($result)){
	
		$c .='<option>'.$row['specify_cat'].'</option>';
	}
$resSess = $news->getUserID($_SESSION['user']);
$use_row = mysqli_fetch_array($resSess);


$tobeEdit = $news->tobEidted($_GET['id']); 
$errMessage ="";
if(isset($_POST['post'])){
    
    $headline = test_input($_POST['title']);
	$article = test_input($_POST['article']);

	$image =   test_input( $_FILES['image']['name']);
	$sub_category = test_input($_POST['sub_cat']);
	$sub_category = $news->getSubID($sub_category);
	$userid = test_input($_SESSION['user']);
	$category = test_input($_POST['category']);
    $newsid = test_input($_GET['id']);
	$category =  $news->getCatID($category);
    try{
    $btn = "submit";
    $news->updateNews($newsid,$category,$sub_category,$article,$image,$headline,$userid,$btn);
    } catch (exception $e){
        
        $errMessage = $e->getMessage();
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

  <br />
  <div class="container">
<br /><br />
<div class="w3-center"><h1>Edit News</h1></div>
<br/>
<div class="w3-container">
<div class="w3-row-padding">
<div class="w3-half">
<div class="">
<div class="w3-container w3-light-grey w3-round-jumbo">
<h2>Headlines</h2>
</div>
<form class="w3-form" method="post" enctype="multipart/form-data">
<div class="w3-group">      
<label class="w3-label w3-text-brown"><b>ID</b></label>
<?php while($row = mysqli_fetch_array($tobeEdit)){ ?>
<input class="w3-input w3-border w3-sand" disabled="" value="<?php echo $row['nid'] ?>" name="title" type="text"/>
</div>
<div class="w3-group">      
<label class="w3-label w3-text-brown"><b>Your headline</b></label>
<input class="w3-input w3-border w3-sand" required="" value="<?php echo $row['headline'] ?>" name="title" type="text"/>
</div>
<div class="w3-group">
<label class="w3-label w3-text-brown"><b>Category:  </b><span class="w3-text-red"> <?php echo $news->catToEd($row['catid']); ?></span></label>
<label class="w3-checkbox">

<input type="radio" class="w3-brown" required="" name="category"  value="Local"/>
<div class="w3-checkmark"></div> Local
</label><br/>
<label class="w3-checkbox">

<input type="radio" name="category" required="" value="International"/>
<div class="w3-checkmark"></div> International
</label><br/>
</div>

<div class="w3-group">      
<label class="w3-label w3-text-brown"><b>Sub Category:</b><span class="w3-text-red"> <?php echo $news->editCat($row['pid']) ?></span></label>
<select class="w3-select w3-section" name="sub_cat">
Select an Option
<option value="" disabled=""  selected="">Choose your option</option>
<option><?php echo $c; ?></option>
</select>
</div>

<div class="w3-group">      
<label class="w3-label w3-text-brown"><b>Image</b></label>
<input class="w3-input w3-border w3-sand" required="" name="image" type="file"  value="" />
</div>


</div>
</div> 

<div class="w3-half">
<?php echo $errMessage;  ?>
<div class="w3-container w3-light-grey w3-center">
   <img src="image/<?php echo $row['image'] ?>" width="30%" />
</div>

<div class="w3-group">      

<textarea name="article" required=""  class="form-control" rows="12" id="comment"  >
 <?php echo $row['news']; ?>
</textarea>
</div>
<div class="w3-group">
<?php } ?>
<div class="w3-right"><button class="w3-btn w3-black" type="submit" name="post">Submit</button></div>

</div>
</form>
</div> 
</div>
</div>
</body>
</html>