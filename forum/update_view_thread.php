<?php
include '../connection/db_connect.php';
            $current_user=$_COOKIE['current_user'];
            $thread_id=$_GET['thread_id'];
           

           $update="UPDATE threads SET thread_views = thread_views + 1 WHERE thread_id=".$thread_id;
              $ex=pg_query($con,$update);
               
              if($ex)
              {
                header("Location:view_thread.php?thread_id=$thread_id");
               
              }
              else
              {
                echo 'False';
              }
            
        
      ?>
