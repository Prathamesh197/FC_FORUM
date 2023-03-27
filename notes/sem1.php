<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="sem1.css">
    <link rel="stylesheet" href="font-6/css/all.css">
    <title>SEM 1</title>
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
    <div class="main_head">Semester 1</div>
    <div class="table_head">
        <div class="subject">Subject</div>
        <div class="subject_code">Subject Code</div>
        <div class="download">Download</div>
    </div>

    <div class="all_data">
    <div class="table_data1">
        <div class="subject">Mathematics I</div>
        <div class="subject_code">CSC1101</div>
        <div class="download"><a href="">Download</a></div>
    </div>

    <div class="table_data2">
        <div class="subject">Mathematics II</div>
        <div class="subject_code">CSC1102</div>
        <div class="download"><a href="">Download</a></div>
    </div>
    <div class="table_data3">
        <div class="subject">Electronics II</div>
        <div class="subject_code">CSC1103</div>
        <div class="download"><a href="">Download</a></div>
    </div>
    <div class="table_data4">
        <div class="subject">Electronics II</div>
        <div class="subject_code">CSC1104</div>
        <div class="download"><a href="">Download</a></div>
    </div>
    <div class="table_data5">
        <div class="subject">C Language</div>
        <div class="subject_code">CSC1105</div>
        <div class="download"><a href="">Download</a></div>
    </div>
    </div> 

<main>
</body>

</html>