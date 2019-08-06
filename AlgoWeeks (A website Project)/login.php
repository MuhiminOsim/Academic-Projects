<?php
if(isset($_COOKIE['cookie_name'])){
  header('Location: home.php');
}
else
{
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}
h1 {
  text-shadow: 2px 2px 5px red;
}
/* Add a background color with some padding */
body {
  font-family: Arial;
  padding: 20px;
  background: #94dcfd;
}

/* Header/Blog Title */
.header {
  padding: 30px;
  font-size: 40px;
  text-align: center;
  background: rgb(0, 153, 255);
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
  float: left;
  width: 75%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
   background-color: white;
   padding: 20px;
   margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
p.groove {
  outline-color:red;
  outline-style: groove;
  font-size: 22px;
}
/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}
/* For Navigation Bars*/
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
.active {
  background-color: rgb(0, 153, 255);
}
/* End of Navigation Bars*/
/* Start of Drop Down*/
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
/*End of Dropdown*/
#submitid{
  height: 30px;
  width: 100px;
  font-size:14pt;
  text-align: center;
  background: rgb(224, 224, 224);
}
</style>
</head>
<body>

<div class="header">
  <h1>Algo Weeks</h1>
</div>
<ul>
  <li><a href="
  <?php
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      echo "logout.php";
    } 
    else {
      echo "register.php";
    }
  ?>">
  <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      echo 'Log Out';
    } 
    else {
      echo 'Register';
    }
  ?></a></li>
  <li><a class="active" href="
  <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      echo "member.php";
    } 
    else {
      echo "login.php";
    }
  ?>">
  <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
      echo 'Profile';
    } 
    else {
      echo 'Log In';
    }
  ?></a></li>
</ul>
<title>Login</title>  
    <style>   
        body{  
    margin-top: 100px;  
    margin-bottom: 100px;  
    margin-right: 150px;  
    margin-left: 80px;  
    background-color: azure ;  
    color: palevioletred;  
    font-family: verdana;  
    font-size: 100%  
      
        }  
            h1 {  
    color: indigo;  
    font-family: verdana;  
    font-size: 100%;  
}  
        h3 {  
    color: indigo;  
    font-family: verdana;  
    font-size: 100%;  
} </style>  
</head>  
<body>    
    <center><h3>Login Form</h3></center>  
<center><form action="" method="POST">  
Username: <input type="text" name="user"><br /><br>
Password: <input type="password" name="pass"><br />
<input type="checkbox" checked="checked" name="remember"/> Remember Me<br>   
<input id="submitid" type="submit" value="Login" name="submit" />  
</form></center> 
<?php  
if(isset($_POST["submit"])){  
  if(!empty($_POST['user']) && !empty($_POST['pass'])) {  
    $user=$_POST['user'];  
    $pass=$_POST['pass'];  
  
    $con=mysqli_connect('localhost','root','','mydb') or die(mysql_error());   
  
    $query=mysqli_query($con,"SELECT * FROM user_registration WHERE username='".$user."' AND password='".$pass."'");  
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0) {  
      while($row=mysqli_fetch_assoc($query)) {  
        $dbusername=$row['username'];  
        $dbpassword=$row['password'];  
      }  
      if(!empty($_POST['remember'])){
      $cookie_name=$_POST['user'];
      $cookie_value=$_POST['pass'];
      setcookie('cookie_name',$cookie_value,time()+(86400*30));
      }
      if($user == $dbusername && $pass == $dbpassword) {  
        session_start();  
        $_SESSION['sess_user']=$user;
        $_SESSION['loggedin'] = true;
        /* Redirect browser */  
        header("Location: home.php");  
      }  
    } 
    else {  
      echo "Invalid username or password!";  
    }  
  
  } else {  
    echo "All fields are required!";  
}  
}  
?>  
<div class="footer">
  <h4>All Copyright Reserved ©2019 Muhiminul Islam Osim</h4>
</div>

</body>
</html>
<?php
}
?>