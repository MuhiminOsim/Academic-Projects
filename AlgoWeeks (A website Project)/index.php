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
   background-color: rgb(0, 153, 255);
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
</style>
</head>
<body>

<div class="header">
  <h1>Algo Weeks</h1>
</div>
<div class="row">
  <div class="card">
    <strong>
      <center><h2>Welcome to AlgoWeeks!</h2></center>
      <center>Already Have An Account?</center>
      <center><a href="login.php">Log in</a></center><br><br>
      <center>Create A New Account</center>
      <center><a href="register.php">Register</a></center><br>
    </strong>
  </div>
</div>

<div class="footer">
  <h4>All Copyright Reserved ©2019 Muhiminul Islam Osim</h4>
</div>

</body>
</html>
