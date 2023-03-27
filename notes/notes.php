<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="notes.css">
    <link rel="stylesheet" href="font-6/css/all.css">
    <title>Notes</title>
</head>

<body>

    <?php include '../connection/db_connect.php';?>
<main>
<nav>
    <ul>
    <li class="logo"><a href="#" style="text-decoration:none;">FC</a>FORUM</li>
      <li class="forum"><a href="../forum/forum.php" style="text-decoration:none;">Forum</a></li>
      <li class="notes"><a href="notes.php" style="text-decoration:none;" id="hover">Notes</a></li>
      <li class="ex_courses"><a href="../ex_courses/ex_courses.php" style="text-decoration:none;">External Courses</a></li>
      <li class="placements"><a href="../placements/placements.php" style="text-decoration:none;">Placements</a></li>
     
<?php
      include '../connection/db_connect.php';
      $current_user=$_COOKIE['current_user'];
      $sql="SELECT * FROM user_profile_image WHERE username='$current_user'";
    
      $exec=pg_query($con,$sql);
      
      while($row=pg_fetch_assoc($exec))
      {
          $image=$row['image'];
    	  echo '<li class="profile_img"><a href="../login_system/user_logout.php"><img src="'.$image.'" alt="No image found" width="3vw" height="5vh"></a></li>';
      }
      ?>
      </ul>
  </nav>

 
    
  <div class="main_content">
    <div class="main_head">View Notes</div>
    <div class="left_blank"></div>
    <div class="fy">
        <div class="first_year_head">First Year</div>
        <div class="sem1"><button><a href="sem1.php">Semester 1</a></button></div>
        <div class="sem2"><button><a href="sem2.php">Semester 2</a></button></div>
    </div>
    <div class="sy">
        <div class="second_year_head">Second Year</div>
        <div class="sem3"><button><a href="sem3.php">Semester 3</a></button></div>
        <div class="sem4"><button><a href="sem4.php">Semester 4</a></button></div>
    </div>
    <div class="ty">
        <div class="third_year_head">Third Year</div>
        <div class="sem5"><button><a href="sem5.php">Semester 5</a></button></div>
        <div class="sem6"><button><a href="sem6.php">Semester 6</a></button></div>
    </div>
    <div class="right_blank"></div>
  </div>
  

<main>
</body>

</html>