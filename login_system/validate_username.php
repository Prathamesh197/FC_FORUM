<?php
include 'db_connect.php';
 
if(isset($_POST['username'])){
    $username =$_POST['username'];
    $query = "SELECT * FROM user_credentials WHERE username='".$username."'";
    $result = pg_query($con,$query);
    echo pg_num_rows($result);
}
?>
