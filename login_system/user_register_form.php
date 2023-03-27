<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user_register_form.css">
    <script src="jquery-3.6.3.min.js"></script>
       
<script type="text/javascript">
   $("#form").ready(function()
   {  
      //Batch Validation
      $("#batch").keyup(function(){
         if(validateBatch())
         {
            $("#batch").css("border","2px solid green");
            $("#batchMsg").html("<p class='text-success' style='padding-left:20px; top:0;'></p>");
         }
         else
         {
            $("#batch").css("border","2px solid red"); 
            $("#batchMsg").html("<p class='text-danger' style='padding-left:20px; top:0;'></p>");
         }
      });

      //Username Validation
      $("#username").keyup(function(){
         var username = $(this).val();
         $.ajax({
            url: 'validate_username.php',
            method:"POST",
            data: {username: username},
            success: function(data){
               if(data != '0')
               {
                  $("#username").css("border","2px solid red");
                  $('#usernameMsg').html('<span class="text-success"></span>'); 
                 
               } 
               else
               {
                  $("#username").css("border","2px solid green");
                  $('#usernameMsg').html('<span class="text-danger"></span>'); 
                 
               }            
         }
         })
      });
      
      //Email Validation
      $("#email").keyup(function(){
         if(validateEmail())
         {
            $("#email").css("border","2px solid green");
            $("#emailMsg").html("<p class='text-success' style='padding-left:20px; top:0;'></p>");
         }
         else
         {
            $("#email").css("border","2px solid red"); 
            $("#emailMsg").html("<p class='text-danger' style='padding-left:20px; top:0;'></p>");
         }
      });

      //Name Validation
      $("#name").keyup(function(){ 
         if(validateName())
         {
            $("#name").css("border","2px solid green");
            $("#nameMsg").html("<p class='text-success'  style='padding-left:20px; top:0;'></p>");
         }
         else
         {
            $("#name").css("border","2px solid red"); 
            $("#nameMsg").html("<p class='text-danger' style='padding-left:20px; top:0;'></p>");
         }
      });

      //Mobile Number Validation
      $("#mno").keyup(function(){
         if(validateMno())
         {
            $("#mno").css("border","2px solid green");
            $("#mnoMsg").html("<p class='text-success' style='padding-left:20px; top:0;'></p>");
         }
         else
         {
            $("#mno").css("border","2px solid red"); 
            $("#mnoMsg").html("<p class='text-danger' style='padding-left:20px; top:0;'></p>");
         }
      });

      //Password Validation
      $("#password").keyup(function(){
         if(validatePassword())
         {
            $("#password").css("border","2px solid green");
            $("#passwordMsg").html("<p class='text-success'  style='padding-left:20px; top:0;'></p>");
         }
         else
         {
            $("#password").css("border","2px solid red"); 
            $("#passwordMsg").html("<p class='text-danger' style='padding-left:20px; top:0;'></p>");
         }
      });
   });

   //Functions for Validations
     
      function buttonState()
      {
         if(validateRoll() && validateUsername() && validateEmail() && validateName() && validateMno()  && validatePassword() )
         {
           // $("#submit").show();
            $('#submit').attr("disabled",false);
         }
         else
         {
           // $("#submit").hide();
           $('#submit').attr("disabled",true);  
         }

      } 
   
   
      function validateRoll()
      {
		  var roll_no=$("#rno").val();
		  if(roll_no.length==6)
        {
		 	return true;
		  }
        else
        {
		 	return false;
		  }
      }
      
      function validateEmail()
      {
		  var email=$("#email").val();
	     var reg_email = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
		  if(reg_email.test(email))
        {
		 	return true;
		  }
        else
        {
		 	return false;
		  }
      }
       
      function validateName()
      {
		  var name=$("#name").val();
        var reg_name =  /^([\w]{3,})+\s+([\w\s]{3,})+$/i
		  if(name.length>2)
        {
          if(reg_name.test(name))
           {
            return true;
           }
		    else
           {
            return false;
           }
		  }
        else
        {
		 	return false;
		  }
      }

      function validateMno()
      {
		  var m_no=$("#mno").val();
		  if(m_no.length==10)
        {
		 	return true;
		  }
        else
        {
		 	return false;
		  }
      }


      function validatePassword()
      {
		  var password=$("#password").val();
        var reg_password=/^[a-zA-Z0-9!@#$%^&*]{6,16}$/
		  if(reg_password.test(password))
        {
			return true;
		  }
        else
        {
			return false;
		  }
      }

      function validateBatch()
      {
		  var batch=$("#batch").val();
		  if(batch.length==4)
        {
		 	return true;
		  }
        else
        {
		 	return false;
		  }
      }

</script>

    <title>Register Form</title>
    
</head>
<body>
 <main>
  
   
    <div class="signup_form">
      <form method="POST" action="insert_user_data.php" name="myform" class="form" enctype="multipart/form-data" id="form">
         <h1 class="text-center">Register</h1>
         <div class="form-step form-step-active">
            <div class="input-group">
               <label for="username">UserName</label>
               <input type="text" name="username" id="username" autocomplete="off">
               <span id="usernameMsg"></span>
            </div>

            <div class="input-group">
                <label for="spassword">Password</label>
                <input type="password" name="password" id="password" autocomplete="off">
                <span id="passwordMsg"></span>
            </div>
            
            <div class="input-group">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" required autocomplete="off">
                <span id="nameMsg"></span>
            </div>

            <div class="input-group">
                <label for="email">Email-Id</label>
                <input type="email" name="email" id="email" placeholder="abc@gmail.com" autocomplete="off">
                <span id="emailMsg"></span>
            </div>

            <div class="input-group">
                <label for="mno">Mobile Number</label>
                <input type="tel" name="mno" id="mno" placeholder="1234567890" autocomplete="off">
                <span id="mnoMsg"></span>
            </div>
 
            <div class="input-group">
                <label for="batch">Batch</label>
                <input type="number" name="batch" id="batch" required autocomplete="off">
                <span id="batchMsg"></span>
            </div>

            <div class="input-group">
               <label for="photo">Upload Photo</label>
               <input type="file" name="image" id="photo" accept=".jpg,.jpeg,.gif,.png" autocomplete="off">
               <span id="imageMsg"></span>
           </div>
            
            <div class="btns-group">
                <input class="btn btn-next" id="submit" type="submit" name="submit" value="Submit">
            </div>
         </div>
      </form>
     </div> 
  <main>
</body>
</html>
