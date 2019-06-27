<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>KUET Student Welfare Centre Management</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .Query-Institution {
                text-align: center;
            }

            .title {
                font-size: 54px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="webpage">
            <div class="content">
                <?php
                    echo "<br>";
                ?>
                <div class="links">
                    <a href="http://www.localhost:8000">Back to Home</a>
                    <a href="http://www.localhost:8000/query_and_aggregate">Back to Queries</a>
                </div>
                <?php
                    echo "<br>";
                ?>
                <div class="title m-b-md">
                    Query on Institutions Table
                </div>
                <div class="Query-Institution">
                	<center>
					<form method="post" action="">
						@csrf
						Institution_ID: <input type="text" name="id">
						Room No.: <input type="text" name="room">
						Access_ID: <input type="text" name="access">
						Manager_ID: <input type="text" name="manager">
						User_ID: <input type="text" name="user"><br>
						Type_ID: <input type="text" name="type">
						<input type="submit" name="submit" value="submit"> 
					</form>
					<?php
						if(isset($_POST['submit'])){
							$id= $_POST['id'];
							$room= $_POST['room'];
							$access= $_POST['access'];
							$manager= $_POST['manager'];
							$user= $_POST['user'];
							$type= $_POST['type'];
							$sql= "SELECT * FROM institutions";
							if($id!='' || $room!='' || $access!='' || $user!='' || $manager!='' || $type!=''){
								$sql.=" WHERE ";
							}
							$v=0;
							if($id!=''){
								$sql.=" Institution_ID = ";
								$sql.=$id;
								$v=1;
							}
							if($room!=''){
								if($v==0){
									$sql.=" Room_No = ";
									$v=1;
								}
								else $sql.=" and Room_No = ";
								$sql.="'".$room."'";
							}
							if($access!=''){
								if($v==0){
									$sql.="Access_ID = ";
									$v=1;
								}
								else $sql.=" and Access_ID = ";
								$sql.=$access;
							}
							if($manager!=''){
								if($v==0){
									$sql.="Manager_ID = ";
									$v=1;
								}
								else $sql.=" and Manager_ID = ";
								$sql.=$manager;
							}
							if($user!=''){
								if($v==0){
									$sql.="User_ID = ";
									$v=1;
								}
								else $sql.=" and User_ID = ";
								$sql.=$user;
							}
							if($type!=''){
								if($v==0){
									$sql.="Type_ID = ";
									$v=1;
								}
								else $sql.=" and Type_ID = ";
								$sql.=$type;
							}
							$sql.=";";
							require('C:\xampp\htdocs\MyProject\resources\views\database_connection.blade.php');
							echo "<br><br><br>";
							echo "Search Result:";
							echo "<br><br>";
							if($result = mysqli_query($link,$sql)){
								if (mysqli_num_rows($result) > 0) {
								    echo "<table>"; 
								    echo "<tr>"; 
								    echo "<th>Institution_ID</th>"; 
								    echo "<th>Room_No</th>";
								    echo "<th>Access_ID</th>";
								    echo "<th>Manager_ID</th>";
								    echo "<th>User_ID</th>";
								    echo "<th>Type_ID</th>";
								    echo "</tr>";
								    while($row = mysqli_fetch_array($result)) {
								    	echo "<tr>"; 
							 			echo "<td>".$row['Institution_ID']."</td>";
							 			echo "<td>".$row['Room_No']."</td>";	
							 			echo "<td>".$row['Access_ID']."</td>";
							 			echo "<td>".$row['Manager_ID']."</td>";
								        echo "<td>".$row['User_ID']."</td>"; 
								        echo "<td>".$row['Type_ID']."</td>"; 
								        echo "</tr>"; 
								    }
								    echo "</table>"; 
								} 
								else {
								    echo "0 results";
								}
							}
						}
					?>
                </div>
            </center>
            </div>
        </div>
    </body>
</html>
