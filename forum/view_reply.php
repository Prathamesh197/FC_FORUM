<?php include '../connection/db_connect.php';?>

        <?php
            $current_user=$_COOKIE['current_user'];
            $thread_id=$_GET['thread_id'];
            $reply_id=$_GET['reply_id'];

           $update="UPDATE replies SET reply_views = reply_views + 1 WHERE reply_id=".$reply_id;
              $ex=pg_query($con,$update);
              $update_like="UPDATE replies SET reply_likes = reply_likes + 1 WHERE reply_id=".$reply_id;
              $ex1=pg_query($con,$update_like);  
              if($ex && $ex1)
              {
                header("Location:all_replies.php?thread_id=$thread_id");
              }
              else
              {
                echo 'False';
              }
            
        
      ?>
    
      