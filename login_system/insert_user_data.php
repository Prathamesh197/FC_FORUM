<?php
session_start();
include 'db_connect.php';


   if(isset($_POST['submit']))  
   {
    $username= $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mno = $_POST['mno'];
    $password = $_POST['password'];
    $batch = $_POST['batch'];
    
    //$s_image = $_POST['s_image'];
    $files = $_FILES['image'];

    $filename=$files['name'];
    //$filename=$files['error'];
    $filetmp=$files['tmp_name'];

    $fileext=explode('.',$filename);
    $filecheck=strtolower(end($fileext));

    $fileextstored=array('png','jpeg','jpg');

     if(in_array($filecheck,$fileextstored))
    { 
      $destinationfile='../upload_image/'.$filename;
      move_uploaded_file($filetmp, $destinationfile);

      $q="insert into user_profile_image(username,image)
          values('$username','$destinationfile')";

      $insert_image = pg_query($con,$q);    
    }
    
    $insertquery="INSERT INTO user_credentials(username,password,name,email_id,mobile_number,batch) 
    VALUES('$username','$password','$name','$email','$mno','$batch')";
    
    $insert_data=pg_query($con,$insertquery);

    
    if($insert_data && $insert_image)
    {
     header("Location:user_login.php");
    }
    else
    {
      ?>
        <script>
        echo"Data Not Inserted";
        </script>
      <?php 
    }
   }
   // header("refresh:1;url=./test.php");

?>
