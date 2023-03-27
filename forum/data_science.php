<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="forum.css">
    <link rel="stylesheet" href="font-6/css/all.css">
    <title>AI</title>
</head>

<body>

    <?php include '../connection/db_connect.php';?>
<main>
<nav>
    <ul>
    <li class="logo"><a href="#" style="text-decoration:none;">FC</a>FORUM</li>
      <li class="forum"><a href="forum.php" style="text-decoration:none;"id="hover">Forum</a></li>
      <li class="notes"><a href="../notes/notes.php" style="text-decoration:none;">Notes</a></li>
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

  <div class="left_nav">
    <div class="filter_main_head">
      <div class="filter_main_heading"><i class="fa-solid fa-filter"></i><b>Forum Filters</b></div>
    </div>
    
    <div class="fil_cat">
      <div class="filter_head"><b>BY TOPIC</b></div>
      <div class="filter_parameter1"><i class="fa-sharp fa-regular fa-circle"></i><a href="ai.php">AI</a></div>
      <div class="filter_parameter1"><i class="fa-regular fa-circle"></i><a href="ml.php">ML</a></div>  
      <div class="filter_parameter1"><i class="fa-regular fa-circle"></i><a href="blockchain.php">Blockchain</a></div>
      <div class="filter_parameter1"><i class="fa-regular fa-circle"></i><a href="vr.php">VR</a></div>
      <div class="filter_parameter1"><i class="fa-regular fa-circle"></i><a href="ar.php">AR</a></div>
      <div class="filter_parameter1"><i class="fa-regular fa-circle"></i><a href="web_dev.php">Web Dev</a></div>
      <div class="filter_parameter1" id="page_active"><i class="fa-regular fa-circle"></i><a href="data_science.php">Data Science</a></div>
      <div class="filter_parameter1"><i class="fa-regular fa-circle"></i><a href="ui.php">UI/UX</a></div>
    </div>

    <div class="other">
      <div class="other_filter_head"><b>OTHERS</b></div>
      <div class="filter_parameter1"><i class="fa-solid fa-eye"></i><a href="most_views.php">Most Views</a></div>  
      <div class="filter_parameter1"><i class="fa-regular fa-comment"></i><a href="most_replies.php">Most Replies</a></div>
    </div>
    
    
  </div>

  <div class="main_content">
    <div class="main_head">Welcome to CS Community</div>
      <div class="table_heading">
        <div class="topic">TOPIC</div>
        <div class="replies">REPLIES</div>
        <div class="views">VIEWS</div>
      </div>
      <div class="threads">
      <?php
       $current_user=$_COOKIE['current_user'];

       $sql1="SELECT * FROM threads WHERE thread_topic='Data Science'";
       $exec1=pg_query($con,$sql1);
       $num1=pg_num_rows($exec1);

       
      
       
       while($row1=pg_fetch_assoc($exec1))
       {
          $thread_id=$row1['thread_id'];
          $thread_name=$row1['thread_name'];
          $thread_created_by=$row1['thread_created_by'];
          $thread_time=$row1['thread_time'];
          $thread_topic=$row1['thread_topic'];
          $thread_replies=$row1['thread_replies'];
          $thread_views=$row1['thread_views'];

          $sql2="SELECT * FROM user_profile_image WHERE username='$thread_created_by'";
          $exec2=pg_query($con,$sql2);
          $num1=pg_num_rows($exec1);

          $sql_count="SELECT COUNT(reply_id) FROM replies WHERE thread_reply_id=$thread_id";
          $exec_count=pg_query($con,$sql_count);
            
          while($row2=pg_fetch_assoc($exec2))
          {
           
            $image=$row2['image'];
            $username=$row2['username'];
            while($count_row=pg_fetch_assoc($exec_count))
            {
            
            echo'<div class="thread">
                  <div class="user_img"><img src="'.$image.'" alt=""></div>
                  <div class="thread_title"><a href="update_view_thread.php?thread_id='.$thread_id.'">'.substr($thread_name,0,40).'...</a></div>
                  <div class="user_details">By : '.$thread_created_by.' at '.$thread_time.'</div>
                  <div class="categories">#'.$thread_topic.'</div>
                  <div class="replies_count_top"></div>
                  <div class="replies_count">'.$count_row['count'].'</div>
                  <div class="replies_title">Replies</div>
                  <div class="views_count_top"></div>
                  <div class="views_count">'.$thread_views.'</div>
                  <div class="views_title">Views</div>
              </div>
            ';
            }
          }  
       }    
      ?>
      </div>
  </div>
  <div class="right_nav">
    <div class="welcome">
      <p>Welcome <b><?php echo $_COOKIE['current_user']; ?></b> , nice to see you again.</p>
    </div>
    <div class="forum_stats">
      <?php
        $sql1="SELECT COUNT(*) FROM threads";
        $exec1=pg_query($con,$sql1);
        $row=pg_fetch_assoc($exec1);
        $num_of_threads=$row['count'];

        $sql2="SELECT COUNT(*) FROM user_credentials";
        $exec2=pg_query($con,$sql2);
        $row2=pg_fetch_assoc($exec2);
        $num_of_users=$row2['count'];

        $sql3="SELECT SUM (thread_views) AS total_views
        FROM threads";
        $exec3=pg_query($con,$sql3);
        $row3=pg_fetch_assoc($exec3);
        $num_of_thread_views=$row3['total_views'];
      ?>
      <div class="stats_head"><i class="fa-solid fa-chart-column"></i><b>FORUM STATS</b></div>
      <div class="total_threads"><b>Total Threads</b><?php echo $num_of_threads;?></div>
      <div class="total_users"><b>Total Users</b>    <?php echo $num_of_users;?></div>
      <div class="total_views"><b>Total Views</b>    <?php echo $num_of_thread_views;?></div>
    </div>
    <div class="create_thread">
    <i class="fa-solid fa-plus"></i><a href="create_thread.php">Start a Thread</a> 
    </div>
    <div class="trending_threads">

      <div class="trending_head"><i class="fa-brands fa-slack"></i><b>TRENDING THREADS</b></div>
    
    <?php
      $query1="SELECT * FROM threads ORDER BY thread_views ASC";
	    $exec1=pg_query($con,$query1);
     
        while($row1=pg_fetch_assoc($exec1))
        {
           $thread_id=$row1['thread_id'];
           $thread_name=$row1['thread_name'];
           $thread_created_by=$row1['thread_created_by'];
           $thread_time=$row1['thread_time'];
           $thread_topic=$row1['thread_topic'];
           $thread_replies=$row1['thread_replies'];
           $thread_views=$row1['thread_views'];
 
           $sql2="SELECT * FROM user_profile_image WHERE username='$thread_created_by'";
           $exec2=pg_query($con,$sql2);
           $num1=pg_num_rows($exec1);
         
           while($row2=pg_fetch_assoc($exec2))
            { 
              echo ' <div class="trending_thread">
        	    <div class="trending_user_img"><img src="'.$row2['image'].'" alt=""></div>
        	    <div class="trending_thread_title"><a href="update_view_thread.php?thread_id='.$thread_id.'">'.substr($row1['thread_name'],0,20).'...</a></div>
        	    <div class="trending_user_details">'.$row1['thread_created_by'].'</div>
        	    <div class="trending_categories">'.$row1['thread_time'].'</div>
      		    </div>';
	          }
        }
    ?>  
      </div>
    </div>
    
  </div>

<main>
</body>

</html>