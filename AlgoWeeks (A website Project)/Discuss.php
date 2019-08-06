<!DOCTYPE html>
<?php
  session_start();
?>
<html>
<head>
<link
  rel="stylesheet"
  type="text/css"
  href="prism.css"
/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
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
/* Pagination*/
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
/*Pagination*/
/*Transition*/
#div2 {
  width: 220px;
  height: 25px;
  background: rgb(224, 224, 224);
  transition: width 1s;
  text-align: center;
}

#div2 {transition-timing-function: ease;}
/* end of transition*/
#textboxid{
    height:100px;
    width: 925px;
    font-size:14pt;
}
#textboxhead{
    height:30px;
    width: 925px;
    font-size:14pt;
}

#submitid{
  height: 25px;
  width: 100px;
  font-size:14pt;
  text-align: center;
  background: rgb(224, 224, 224);
}

#test {
  float: right;
}

#div2:hover {
  width: 275px;
}
</style>
</head>
<body>
<div class="header">
  <h1>Discuss</h1>
</div>
<ul>
  <li><a href="home.php">Home</a></li>
  <li><a href="Code Library.php">Code Library</a></li>
  <li><a href="Algorithms.php">Algorithms & Concepts</a></li>
  <li><a class="active" href="Discuss.php">Discuss</a></li>
  <li id="test"><a href="
  <?php
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
  <li id="test"><a href="
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
<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <form action="" method="POST">
        <strong>Title</strong><br><br>
        <input id="textboxhead" type="text" name="head" size=50><br><br>
        <strong>Your Problem</strong><br><br>
        <textarea name="post1" rows="5" cols="100" maxlength="100000"></textarea><br><br>
        <input id="submitid" type="submit" name="submit" value="Post">
      </form>
      <?php
        $user = $_SESSION['sess_user'];
        require('C:\xampp\htdocs\AlgoWeeks\connection.php');
        if(isset($_POST['submit'])){
          $head= mysqli_real_escape_string($link, $_POST['head']);
          $post1= mysqli_real_escape_string($link, $_POST['post1']);
          if($head=='' || $post1==''){
            echo "All fields must be filled up!";
          }
          else{
            $sql = "INSERT INTO discuss (user, post, head) VALUES('$user','$post1','$head');";
            if ($link->query($sql) === TRUE) {
              echo '<script language="javascript">';
              echo 'window.alert("Your problem posted successfully!")';
              echo '</script>';
            } 
            else {
              echo "Error posting your problem: " . $link->error;
              echo "<br>";
            }
          }
        } 
      ?>
    </div>
    <div class="card">
      <?php
        $user = $_SESSION['sess_user'];
        require('C:\xampp\htdocs\AlgoWeeks\connection.php');
        $sql = "SELECT id, user, post, head, time FROM discuss ORDER BY time desc;";
        if($result = mysqli_query($link,$sql)){
          if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_array($result)) {
                $id = $row['id'];
                echo "<strong>".$row['head']."</strong><br><br>";
                echo "<strong>Posted By ".$row['user']."<br><br><div id='div2' >".$row['time']."</div></strong><br><br>";
                echo nl2br($row['post'])."<br><br><br>";
                echo "
                <form action='' method='POST'>
                  <textarea name='comment' rows='5' cols='80' maxlength='100000'></textarea><br>
                  <input id='submitid' type='submit' name='submit2' value='Answer'>
                </form>
                ";
                if(isset($_POST['submit2'])){
                  $com = mysqli_real_escape_string($link, $_POST['comment']);
                  $sql = "INSERT INTO diss_comm (name, comment, dissid) VALUES('$user','$com','$id');";
                  if ($link->query($sql) === TRUE) {
                  } 
                  else {
                    echo "Error commenting: " . $link->error;
                    echo "<br>";
                  }
                }
                $sql1 = "SELECT name, comment FROM diss_comm WHERE dissid ='$id';";
                if($result1 = mysqli_query($link,$sql1)){
                  echo "<br><strong>Answers</strong><br>";
                  if (mysqli_num_rows($result1) > 0) {
                      while($row = mysqli_fetch_array($result1)) {
                        echo "<strong>".$row['name']."</strong>: ";
                        echo $row['comment'];
                        echo "<br><br>";
                      }
                  } 
                  else {
                      echo "No answers";
                  }
                }
                echo "<br>---------------------------------------------------------------------------------------";
                echo "---------------------------------------------------------------------------------------<br>";
              }
          } 
          else {
              echo "No posts";
          }
        }
      ?>
    </div>
  </div>
  <div class="rightcolumn">
    <div class="card">
      Hello, <strong><?php echo $_SESSION['sess_user']?>!</strong><br>
    </div>
    <div class="card">
      <center>
	<iframe src="http://free.timeanddate.com/clock/i6td3brp/n73/szw110/szh110/hoc090/hbw0/hfcf00/cf100/hnc090/hwc000/fan2/fas20/facf00/fdi60/mqcfff/mqs4/mql2/mqw4/mqd78/mhc9f0/mhs4/mhl3/mhw4/mhd78/mmv0/hhc090/hhs2/hmc090/hms2/hsc090" frameborder="0" width="110" height="110"></iframe>
      </center>
    </div>
    <div class="card">
	<center>
      <div class="dropdown">
        <button class="dropbtn">Follow Us</button>
        <div class="dropdown-content">
        <a href="https://github.com/MuhiminOsim">Github</a>
        <a href="https://linkedin.com/in/muhimin-osim/">LinkedIn</a>
        <a href="https://www.facebook.com/muhimin.osim">Facebook</a>
        </div>
      </div>
	</center>
    </div>
  </div>
</div>
<div class="card">
  <div class="pagination">
      <a href="home.php">&laquo;</a>
      <a class="active" href="home.php">1</a>
      <a href="home.php">&raquo;</a>
  </div>
</div>
<div class="footer">
    <h4>All Copyright Reserved ©2019 Muhiminul Islam Osim</h4>
</div>
<script> src="prism.js" </script>
</body>
</html>
