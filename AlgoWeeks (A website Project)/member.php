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
</style>
</head>
<body>

<div class="header">
  <h1>Profile</h1>
</div>
<ul>
  <li><a href="home.php">Home</a></li>
  <li><a href="Code Library.php">Code Library</a></li>
  <li><a href="Algorithms.php">Algorithms & Concepts</a></li>
  <li><a href="Discuss.php">Discuss</a></li>
  <li id="test"><a href="logout.php">Log Out</a></li>
  <li id="test"><a class="active" href="member.php">Profile</a></li>
</ul>
<div class="row">
  <div class="leftcolumn">
  <div class="card">
    <strong>Your posts</strong>
  </div>
  <div class="card">
      <?php
        $user = $_SESSION['sess_user'];
        require('C:\xampp\htdocs\AlgoWeeks\connection.php');
        $type="Code";
        $sql = "SELECT id, post, type, name, time FROM blog WHERE user='$user';";
        if($result = mysqli_query($link,$sql)){
          if (mysqli_num_rows($result) > 0) {
              while($row = mysqli_fetch_array($result)) {
                $id = $row['id'];
                echo "<strong>".$row['name']."</strong><br><br>";
                echo "<strong><div id='div2' >".$row['time']."</div></strong><br><br>";
                if($row['type']=="Code"){
                  echo "<pre><code class='language-c++'>";
                }
                echo nl2br($row['post'])."<br><br><br>";
                if($row['type']=="Code"){
                  echo "</code></pre>";
                }
                echo "
                <form action='' method='POST'>
                  <textarea name='comment' rows='5' cols='70' maxlength='100000'></textarea><br>
                  <input id='submitid' type='submit' name='submit2' value='Comment'>
                </form>
                ";
                if(isset($_POST['submit2'])){
                  $com = mysqli_real_escape_string($link, $_POST['comment']);
                  $sql = "INSERT INTO comments (name1, comment, blogid) VALUES('$user','$com','$id');";
                  if ($link->query($sql) === TRUE) {
                  } 
                  else {
                    echo "Error commenting: " . $link->error;
                    echo "<br>";
                  }
                }
                $sql1 = "SELECT name1, comment FROM comments WHERE blogid ='$id';";
                if($result1 = mysqli_query($link,$sql1)){
                  echo "<br><strong>Comments</strong><br>";
                  if (mysqli_num_rows($result1) > 0) {
                      while($row = mysqli_fetch_array($result1)) {
                        echo $row['name1'].": ";
                        echo $row['comment'];
                        echo "<br><br>";
                      }
                  } 
                  else {
                      echo "No comments";
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

<div class="footer">
  <h4>All Copyright Reserved ©2019 Muhiminul Islam Osim</h4>
</div>
<script src="prism.js"></script>
</body>
</html>
