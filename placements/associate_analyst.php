<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="placements.css">
    <link rel="stylesheet" href="../font-6/css/all.css">
    <title>Placements</title>
</head>

<body>

    <?php include '../connection/db_connect.php';?>
<main>
<nav>
    <ul>
    <li class="logo"><a href="#" style="text-decoration:none;">FC</a>FORUM</li>
      <li class="forum"><a href="../forum/forum.php" style="text-decoration:none;">Forum</a></li>
      <li class="notes"><a href="../notes/notes.php" style="text-decoration:none;">Notes</a></li>
      <li class="ex_courses"><a href="../ex_courses/ex_courses.php" style="text-decoration:none;">External Courses</a></li>
      <li class="placements"><a href="placements.php" style="text-decoration:none;" id="hover">Placements</a></li>
     
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
      <div class="filter_main_heading"><i class="fa-solid fa-filter"></i><b>Filters</b></div>
    </div>
    <div class="fil_cat">
       
        <div class="filter_head">Company</div>
        <div class="filter_parameter1"><i class="fa-solid fa-hashtag"></i><a href="accenture.php">Accenture</a></div>
        <div class="filter_parameter1"><i class="fa-solid fa-hashtag"></i><a href="deloitte.php">Deloitte</a></div>
        <div class="filter_parameter1"><i class="fa-solid fa-hashtag"></i><a href="deshaw.php">D.E.Shaw</a></div>
        <div class="filter_parameter1"><i class="fa-solid fa-hashtag"></i><a href="tcs.php">TCS</a></div>
    </div>
    <div class="other_fil_head">
       
        <div class="other_filter_head">Role</div>
        <div class="filter_parameter1"><i class="fa-solid fa-hashtag"  id="hover"></i><a href="associate_analyst.php">Associate Analyst</a></div>
        <div class="filter_parameter1"><i class="fa-solid fa-hashtag"></i><a href="systems_associate.php">Systems Associate</a></div>
        <div class="filter_parameter1"><i class="fa-solid fa-hashtag"></i><a href="web_developer.php">Web Developer</a></div>
    </div>
   
  </div>

  <div class="main_content">
    <div class="main_head">Secure and grow your career . Stay updated ! </div>
      <div class="table_heading">
      <div class="offerd_by">COMPANY</div>
        <div class="course_name">ROLE</div>
        <div class="platform">INTAKE</div>
        <div class="duration">DOCS</div>
        <div class="fees">PACKAGE</div>
      </div>
      <div class="courses">
      <?php
       $current_user=$_COOKIE['current_user'];

       $sql1="SELECT * FROM placements WHERE job_role='Associate Analyst'";
       $exec1=pg_query($con,$sql1);
       $num1=pg_num_rows($exec1);

       while($row1=pg_fetch_assoc($exec1))
       {
          $company_id=$row1['company_id'];
          $job_role=$row1['job_role'];
          $job_intake=$row1['job_intake'];
          $attachments=$row1['attachments'];
          $package=$row1['package'];
          $company_name=$row1['company_name'];


        //   $sql_count="SELECT COUNT(course_id) FROM courses";
        //   $exec_count=pg_query($con,$sql_count);
            
          
        echo'<div class="course">
                    <div class="offered_by">'.$company_name.'
                    </div>
                    <div class="course_name">'.$job_role.'
                    </div>
                    <div class="platform">'.$job_intake.'
                    </div>
                    <div class="duration"><a href="docs\accenture.pdf">View</a>
                    </div>
                    <div class="fees">'.$package.'
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