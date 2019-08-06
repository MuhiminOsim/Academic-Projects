<?php   
session_start();  
unset($_SESSION['sess_user']);  
setcookie('cookie_name',"",time()-3600);
session_destroy();  
header("location:index.php");  
?>  