<?php
// <?php

session_start();
setcookie("current_user", "", time() - 3600); //send browser command remove sid from cookie
session_destroy(); //remove sid-login from server storage
session_write_close();
header("Cache-Control: no-cache");
header('Location:user_login.php');

?>
