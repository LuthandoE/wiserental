  
  <?php
require_once("config.php");
require_once("News.php");
 
 $newsObj = new News(); 
 $res = $newsObj->getNews();
 $result = $newsObj->getEntMusic();
 $res2 = $newsObj->getEntTV();
 $res3 = $newsObj->getDiski();
 $res4 = $newsObj->getDiski01();
 
 $res5 = $newsObj->getRugby();
 $res6 = $newsObj->getCricket();
 $res7 = $newsObj->getMemes();
 $res0 = $newsObj->getCelebNews();
 $gadget = $newsObj->getGadget();
 $Scienc = $newsObj->getTech();
 
 $man = $newsObj->getFasioMan();
 $wman = $newsObj->getFasioWman();
 $kid = $newsObj->getKid();
 $motor = $newsObj->getMtr();
 $motors = $newsObj->getMotoring();
 
 $wmen = $newsObj->getFasioWmen();
 $men = $newsObj->getMen();
 $kids = $newsObj->getKids();
 
 
 $celebTop = $newsObj->getNews();
 $celebTtop = $newsObj->getNews();
 
 $music = $newsObj->getMusicNews();
 $fasio = $newsObj->getFasioWman();
 $motr = $newsObj->getMtr();
 $sport = $newsObj->getDiski01();
 
 $musicTop = $newsObj->getMusicNews();
 $sportTop = $newsObj->getDiski01();
 $motrTitle = $newsObj->getMtr();
 
 $sportTop2 = $newsObj->getDiski01();
 $gadgetTop2 = $newsObj->getGadget();
 $fasioTop2 = $newsObj->getFasioWman();
 
 $MotLaunch = $newsObj->getMotorLaunches();
 
 
?>
   <div  class="container-fluid w3-margin-top w3-white" >
        <div class="col-sm-6 w3-margin-0 w3-padding-0"> 
            <table class="table w3-margin-0 w3-padding-0" >
             <tr>
           
           <?php 
            while($row = mysqli_fetch_array($celebTop)){ ?>
              <td><img src="image/<?php echo $row['image'];  ?>" style="width: 100px; height: 100;" /></td>
              <td ><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"> <strong><?php echo $row['headline']; ?></strong> </a><br /><br />
                <p><?php echo $row['specify_cat']; ?> 
                <br /><span class="fa fa-clock-o"></span> <?php echo $newsObj->humanTiming(strtotime($row['posted_on'])); ?></p>
             
              </td>
              
           </tr> <?php  } ?>  
           <?php 
            while($row = mysqli_fetch_array($music)){ ?>
           <tr>
              <td><img src="image/<?php echo $row['image'];  ?>" style="width: 100px; height: 100;" /></td>
              <td ><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"> <strong><?php echo $row['headline']; ?></strong> </a><br /><br />
                <?php echo $row['specify_cat']; ?><br /> <span class="fa fa-clock-o"></span> <?php echo $newsObj->humanTiming(strtotime($row['posted_on'])); ?>
             
              </td>
              
           </tr> <?php  } ?>
        </table>
     </div>
     <div class="col-md-6 w3-margin-0 w3-padding-0"> 
            <table class="table  w3-margin-0 w3-padding-0" >
             <tr>
           
           <?php 
            while($row = mysqli_fetch_array( $gadgetTop2)){ ?>
              <td><img src="image/<?php echo $row['image'];  ?>" style="width: 100px; height: 100;" /></td>
              <td ><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"> <strong><?php echo $row['headline']; ?></strong> </a><br /><br />
                <?php echo $row['specify_cat']; ?> <br /> <span class="fa fa-clock-o"></span> <?php echo $newsObj->humanTiming(strtotime($row['posted_on'])); ?>
             
              </td>
              
           </tr> <?php  } ?>  
           <?php 
            while($row = mysqli_fetch_array($motr)){ ?>
           <tr>
              <td><img src="image/<?php echo $row['image'];  ?>" style="width: 100px; height: 100;" /></td>
              <td ><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"> <strong><?php echo $row['headline']; ?></strong> </a><br /><br />
                <?php echo $row['specify_cat']; ?><br /> <span class="fa fa-clock-o"></span> <?php echo $newsObj->humanTiming(strtotime($row['posted_on'])); ?>
             
              </td>
              
           </tr> <?php  } ?>
           <?php 
            while($row = mysqli_fetch_array($fasioTop2)){ ?>
           <tr>
              <td><img src="image/<?php echo $row['image'];  ?>" style="width: 100px; height: 100;" /></td>
              <td ><a href="read-news.php?id=<?php echo $row['nid'] ?>" class="w3-text-black"> <strong><?php echo $row['headline']; ?></strong> </a><br /><br />
                <?php echo $row['specify_cat']; ?> <br /> <span class="fa fa-clock-o"></span> <?php echo $newsObj->humanTiming(strtotime($row['posted_on'])); ?>
             
              </td>    
           </tr> <?php  } ?>
        </table>
     </div>
     </div>