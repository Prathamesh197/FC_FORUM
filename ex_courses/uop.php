<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="ex_courses.css">
    <link rel="stylesheet" href="font-6/css/all.css">
    <title>Ex Courses</title>
</head>

<body>

    <?php include '../connection/db_connect.php';?>
<main>
<nav>
    <ul>
    <li class="logo"><a href="#" style="text-decoration:none;">FC</a>FORUM</li>
      <li class="forum"><a href="../forum/forum.php" style="text-decoration:none;">Forum</a></li>
      <li class="notes"><a href="../notes/notes.php" style="text-decoration:none;">Notes</a></li>
      <li class="ex_courses"><a href="ex_courses.php" style="text-decoration:none;"  id="hover">External Courses</a></li>
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

 

  <div class="left_nav">
  <div class="filter_main_head">
      <div class="filter_main_heading"><i class="fa-solid fa-filter"></i><b>Course Filters</b></div>
    </div>

    <div class="fil_cat">
        <div class="filter_head">Offered By</div>
        <div class="filter_parameter1"><i class="fa-solid fa-building-columns"></i><a href="uom.php">University of Michigan</a></div>
        <div class="filter_parameter1"><i class="fa-solid fa-building-columns"></i><a href="uop.php">University of Pune</a></div>
        <div class="filter_parameter1"><i class="fa-solid fa-building-columns"></i><a href="google.php">Google</a></div>
        <div class="filter_parameter1"><i class="fa-solid fa-building-columns"></i><a href="meta.php">Meta</a></div>
    </div>
        
    <div class="other">
    <div class="other_filter_head">Platform</div> 
        <div class="filter_parameter1"><i class="fa-solid fa-hashtag"></i><a href="coursera.php">Coursera</a></div>
        <div class="filter_parameter1"><i class="fa-solid fa-hashtag"></i><a href="udacity.php">Udacity</a></div>
        <div class="filter_parameter1"><i class="fa-solid fa-hashtag"></i><a href="google_cer.php">Google Certificates</a></div>
    </div>
   
  </div>

  <div class="main_content">
    <div class="main_head">Skill up yourself with these courses</div>
      <div class="table_heading">
      <div class="offerd_by">OFFERED BY</div>
        <div class="course_name">COURSE NAME</div>
        <div class="platform">PLATFORM</div>
        <div class="duration">DURATION</div>
        <div class="fees">FEES</div>
      </div>
      <div class="courses">
      <?php
       $current_user=$_COOKIE['current_user'];

       $sql1="SELECT * FROM courses WHERE course_offered_by='University of Pune'";
       $exec1=pg_query($con,$sql1);
       $num1=pg_num_rows($exec1);

       
      
       
       while($row1=pg_fetch_assoc($exec1))
       {
          $course_id=$row1['course_id'];
          $course_offered_by=$row1['course_offered_by'];
          $course_name=$row1['course_name'];
          $course_platform=$row1['course_platform'];
          $course_duration=$row1['course_duration'];
          $course_fees=$row1['course_fees'];


        //   $sql_count="SELECT COUNT(course_id) FROM courses";
        //   $exec_count=pg_query($con,$sql_count);
            
          
        echo'<div class="course">
                    <div class="offered_by">'.$course_offered_by.'
                    </div>
                    <div class="course_name"><a href="">'.$course_name.'</a>
                    </div>
                    <div class="platform">'.$course_platform.'
                    </div>
                    <div class="duration">'.$course_duration.'
                    </div>
                    <div class="fees">'. $course_fees.'
                    </div>
              </div>
            ';
            }
            
           
      ?>
      </div>
  </div>
  
<main>
</body>

</html>