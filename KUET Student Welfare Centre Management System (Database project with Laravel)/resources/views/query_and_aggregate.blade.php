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

            .Query-and-Aggregate-Functions {
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
                </div>
                <?php
                    echo "<br>";
                ?>
                <div class="title m-b-md">
                    Queries
                </div>
                <div class="Query-and-Aggregate-Functions">
                	<div class="links">
                        <a href="http://www.localhost:8000/query_user">Users</a>
                        <a href="http://www.localhost:8000/query_manager">Managers</a>
                        <a href="http://www.localhost:8000/query_access">Access</a>
                        <a href="http://www.localhost:8000/query_institution">Institutions</a>
                        <a href="http://www.localhost:8000/query_institution_user">Institutions and Users</a>
                        <a href="http://www.localhost:8000/query_count">Counts</a>
                    </div>
					<?php
					/*
					require('C:\xampp\htdocs\MyProject\resources\views\database_connection.blade.php');

					$sql = "SELECT * FROM institutions;";

					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Full Details about 'institutions' table";
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

					echo "<br><br>";

					$sql = "SELECT DISTINCT (Manager_ID) FROM institutions;";

					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All Distinct Manager_ID of 'institutions' table";

					if($result = mysqli_query($link,$sql)){
						if (mysqli_num_rows($result) > 0) {
						    echo "<table>"; 
						    echo "<tr>"; 
						    echo "<th>Manager_ID</th>";   
						    echo "</tr>";
						    while($row = mysqli_fetch_array($result)) {
						    	echo "<tr>"; 
						        echo "<td>".$row['Manager_ID']."</td>"; 
						        echo "</tr>"; 
						    }
						    echo "</table>"; 
						} 
						else {
						    echo "0 results";
						}
					}

					echo "<br><br>";

					$sql = "SELECT Institution_ID, Access_ID, Manager_ID, User_ID FROM institutions WHERE Room_No=201 OR Room_No=202;";

					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Details of 'institutions' table where Room_No is either 201 or 202";
					if($result = mysqli_query($link,$sql)){
						if (mysqli_num_rows($result) > 0) {
						    echo "<table>"; 
						    echo "<tr>"; 
						    echo "<th>Institution_ID</th>"; 
						    echo "<th>Access_ID</th>";
						    echo "<th>Manager_ID</th>"; 
						    echo "<th>User_ID</th>";  
						    echo "</tr>";
						    while($row = mysqli_fetch_array($result)) {
						    	echo "<tr>"; 
						        echo "<td>".$row['Institution_ID']."</td>"; 
						        echo "<td>".$row['Access_ID']."</td>"; 
						        echo "<td>".$row['Manager_ID']."</td>"; 
						        echo "<td>".$row['User_ID']."</td>"; 
						        echo "</tr>"; 
						    }
						    echo "</table>"; 
						} 
						else {
						    echo "0 results";
						}
					}

					echo "<br><br>";

					$sql = "SELECT User_ID, Dept_ID FROM users WHERE User_name like '%Muhiminul Islam%';";

					echo "&nbsp;User_ID & Dept_ID of 'users' table where User_name is Muhiminul Islam";
					if($result = mysqli_query($link,$sql)){
						if (mysqli_num_rows($result) > 0) {
						    echo "<table>"; 
						    echo "<tr>"; 
						    echo "<th>User_ID</th>"; 
						    echo "<th>Dept_ID</th>";
						    echo "</tr>";
						    while($row = mysqli_fetch_array($result)) {
						    	echo "<tr>"; 
					 			echo "<td>".$row['User_ID']."</td>";
						        echo "<td>".$row['Dept_ID']."</td>"; 
						        echo "</tr>"; 
						    }
						    echo "</table>"; 
						} 
						else {
						    echo "0 results";
						}
					}

					echo "<br><br>";

					$sql = "SELECT User_ID, User_Name, Batch, Roll FROM users ORDER By Batch, Roll desc;";

					echo "&nbsp;User_ID & User_name of 'users' table Ordered by Batch with Roll in descending order";
					if($result = mysqli_query($link,$sql)){
						if (mysqli_num_rows($result) > 0) {
						    echo "<table>"; 
						    echo "<tr>"; 
						    echo "<th>User_ID</th>"; 
						    echo "<th>User_Name</th>";
						    echo "<th>Batch</th>";
						    echo "<th>Roll</th>";
						    echo "</tr>";
						    while($row = mysqli_fetch_array($result)) {
						    	echo "<tr>"; 
					 			echo "<td>".$row['User_ID']."</td>";
						        echo "<td>".$row['User_Name']."</td>"; 
						        echo "<td>".$row['Batch']."</td>";
						        echo "<td>".$row['Roll']."</td>";
						        echo "</tr>"; 
						    }
						    echo "</table>"; 
						} 
						else {
						    echo "0 results";
						}
					}

					echo "<br><br>";

					$sql = "SELECT COUNT(ALL Manager_ID), COUNT(DISTINCT Manager_ID), COUNT(ALL Access_ID), COUNT(DISTINCT Access_ID) FROM institutions;";

					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Number of Distinct and All Values of Manager_ID & Access_ID in table 'institutions'";
					if($result = mysqli_query($link,$sql)){
						if (mysqli_num_rows($result) > 0) {
						    echo "<table>"; 
						    echo "<tr>"; 
						    echo "<th>COUNT(ALL Manager_ID)</th>"; 
						    echo "<th>COUNT(DISTINCT Manager_ID)</th>";
						    echo "<th>COUNT(ALL Access_ID)</th>";
						    echo "<th>COUNT(DISTINCT Access_ID)</th>";
						    echo "</tr>";
						    while($row = mysqli_fetch_array($result)) {
						    	echo "<tr>"; 
					 			echo "<td>".$row['COUNT(ALL Manager_ID)']."</td>";
						        echo "<td>".$row['COUNT(DISTINCT Manager_ID)']."</td>"; 
						        echo "<td>".$row['COUNT(ALL Access_ID)']."</td>";
						        echo "<td>".$row['COUNT(DISTINCT Access_ID)']."</td>";
						        echo "</tr>"; 
						    }
						    echo "</table>"; 
						} 
						else {
						    echo "0 results";
						}
					}

					echo "<br><br>";

					$sql = "SELECT Batch, COUNT(*) FROM users GROUP BY Batch;";

					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Number of Values in table 'users' Grouped By Batch";
					if($result = mysqli_query($link,$sql)){
						if (mysqli_num_rows($result) > 0) {
						    echo "<table>"; 
						    echo "<tr>"; 
						    echo "<th>Batch</th>"; 
						    echo "<th>COUNT(Values)</th>";
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

					echo "<br><br>";
					*/
					?>
                </div>
            </div>
        </div>
    </body>
</html>