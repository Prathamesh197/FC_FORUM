
<?php
   include 'db_connect.php';

    if(isset($_POST['Login']))  
      {
       $username_check = $_POST['username_check'];
       $password_check = $_POST['password_check'];
       $query="SELECT * FROM user_credentials WHERE username='$username_check' AND password='$password_check'";
       $result=pg_query($con,$query);
       $count=pg_num_rows($result);
       $login_check=pg_fetch_assoc($result);

       $user=$login_check['username'];
       setcookie("current_user","$user",time()+ 86400,"/");
       $current_user=$_COOKIE['current_user'];
      
       if($count==1)
        {
         
          header("Location:../forum/forum.php");  
   
        }
        else
        {
       
          header("Location:user_login.php");
        }
       }
      //  $_SESSION['username']=$login_check['username'];
      //  if($count==1)
      //   {
      //     $_SESSION['status']="Registered Successfully!";
      //     $_SESSION['success_code']="success"; 
      //     header("Location:forum.php");  
   
      //   }
      //   else
      //   {
      //    $_SESSION['status']="Registeration UnSuccessfull!";
      //    $_SESSION['error_code']="error";
      //     header("Location:user_login.php");
      //   }
      //  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user_login_page.css">
    <title>User Login Form</title>
   
   
</head>
<body>
 <main> 

   
     <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form" method="POST">
     
      <h1 class="text-center" style="color:purple;">USER LOGIN</h1>
         
     
            <div class="input-group">
                <label for="username_check">Username</label>
                <input type="text" name="username_check" id="username_check">
             </div>

             <div class="input-group">
                <label for="password_check">Password</label>
                <input type="password" name="password_check" id="password_check">
             </div> 
 
             
             <div class="btns-group">
                <input class="btn btn-prev" type="submit" name="Login" value="LOGIN" style="font-weight:bold;">
             </div>

            
      </form>
 <main>   
</body>
     
    </html> 
     
 
