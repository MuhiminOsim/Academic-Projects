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

            .Query-Count {
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
                    Query on Counts
                </div>
                <div class="Query-Counts">
                	<center>
					<form method="post" action="">
						@csrf
						Details About: <input type="radio" name="detail" value="user">Users
						<input type="radio" name="detail" value="manager">Managers
						<input type="radio" name="detail" value="institution">Institutions
						<input type="radio" name="detail" value="batch">Batch<br>
						<input type="submit" name="submit" value="submit"> 
					</form>
					<?php
						if(isset($_POST['submit'])){
							$detail= $_POST['detail'];
							$sql= "SELECT COUNT(DISTINCT User_ID), COUNT(DISTINCT Type_ID), COUNT(DISTINCT Manager_ID) FROM Institutions;";
							require('C:\xampp\htdocs\MyProject\resources\views\database_connection.blade.php');

							$cuser=0;
							$cmanager=0;
							$cinstitution=0;
							if($result = mysqli_query($link,$sql)){
								if (mysqli_num_rows($result) > 0) {
								    while($row = mysqli_fetch_array($result)) {
							 			$cuser=$row['COUNT(DISTINCT User_ID)'];
							 			$cmanager=$row['COUNT(DISTINCT Manager_ID)'];
							 			$cinstitution=$row['COUNT(DISTINCT Type_ID)'];
								    }
								} 
								else {
								    echo "0 results";
								}
							}
							if($detail=="user"){
								$sql = "SELECT COUNT(ALL Roll) FROM users;";
								$cnt=0;
								if($result = mysqli_query($link,$sql)){
									if (mysqli_num_rows($result) > 0) {
									    while($row = mysqli_fetch_array($result)) {
								 			$cnt=$row['COUNT(ALL Roll)'];
									    }
									} 
									else {
									    echo "0 results";
									}
								}
								echo "Total users = "."$cnt";
								echo "<br>";
								echo "Users currently using rooms = "."$cuser";
								echo "<br>";
								$cnt = $cnt-$cuser;
								echo "Users not using = "."$cnt";
							}
							else if($detail=="manager"){
								$sql = "SELECT COUNT(ALL Manager_ID) FROM managers;";
								$cnt=0;
								if($result = mysqli_query($link,$sql)){
									if (mysqli_num_rows($result) > 0) {
									    while($row = mysqli_fetch_array($result)) {
								 			$cnt=$row['COUNT(ALL Manager_ID)'];
									    }
									} 
									else {
									    echo "0 results";
									}
								}
								echo "Total managers = "."$cnt";
								echo "<br>";
								echo "Managers currently managing rooms = "."$cmanager";
								echo "<br>";
								$cnt = $cnt-$cmanager;
								echo "Managers not managing = "."$cnt";
							}
							else if($detail=="institution"){
								$sql = "SELECT COUNT(ALL Type_ID) FROM Institution_types;";
								$cnt=0;
								if($result = mysqli_query($link,$sql)){
									if (mysqli_num_rows($result) > 0) {
									    while($row = mysqli_fetch_array($result)) {
								 			$cnt=$row['COUNT(ALL Type_ID)'];
									    }
									} 
									else {
									    echo "0 results";
									}
								}
								echo "Total rooms = "."$cnt";
								echo "<br>";
								echo "Current alloted rooms = "."$cinstitution";
								echo "<br>";
								$cnt = $cnt-$cinstitution;
								echo "Not alloted rooms = "."$cnt";
							}
							else if($detail=='batch'){
								$sql="SELECT Batch, COUNT(*) from users GROUP BY Batch;";
								if($result = mysqli_query($link,$sql)){
								if (mysqli_num_rows($result) > 0) {
								    echo "<table>"; 
								    echo "<tr>"; 
								    echo "<th>Batch</th>"; 
								    echo "<th>Allotted Rooms</th>";
								    echo "</tr>";
								    while($row = mysqli_fetch_array($result)) {
								    	echo "<tr>"; 
							 			echo "<td>".$row['Batch']."</td>";
							 			echo "<td>".$row['COUNT(*)']."</td>";	 
								        echo "</tr>"; 
								    }
								    echo "</table>"; 
								} 
								else {
								    echo "0 results";
								}
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
