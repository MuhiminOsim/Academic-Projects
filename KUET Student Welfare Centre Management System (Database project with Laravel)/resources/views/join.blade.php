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

            .join {
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
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

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
                    JOINS
                </div>
                <div class="join">
					<?php

					require('C:\xampp\htdocs\MyProject\resources\views\database_connection.blade.php');

					$sql = "SELECT institutions.Room_No, institutions.Access_ID, users.User_Name FROM institutions JOIN users USING(User_ID);";

					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Room_No, Access_ID & User_Name by Joining Two Tables 'institutions' & 'users' using User_ID";
					if($result = mysqli_query($link,$sql)){
						if (mysqli_num_rows($result) > 0) {
						    echo "<table>"; 
						    echo "<tr>"; 
						    echo "<th>Room_No</th>"; 
						    echo "<th>Access_ID</th>";
						    echo "<th>User_Name</th>";  
						    echo "</tr>";
						    while($row = mysqli_fetch_array($result)) {
						    	echo "<tr>"; 
						        echo "<td>".$row['Room_No']."</td>"; 
						        echo "<td>".$row['Access_ID']."</td>";  
						        echo "<td>".$row['User_Name']."</td>"; 
						        echo "</tr>"; 
						    }
						    echo "</table>"; 
						} 
						else {
						    echo "0 results";
						}
					}

					echo "<br><br>";

					$sql = "SELECT users.User_Name, users.Roll, Dept_ID, departments.Dept_Name FROM users NATURAL JOIN departments;";

					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Natural Join of Two Tables users and departments";
					if($result = mysqli_query($link,$sql)){
						if (mysqli_num_rows($result) > 0) {
						    echo "<table>"; 
						    echo "<tr>"; 
						    echo "<th>User_Name</th>";
						    echo "<th>Roll</th>";
						    echo "<th>Dept_ID</th>"; 
						    echo "<th>Dept_Name</th>";
						    echo "</tr>";
						    while($row = mysqli_fetch_array($result)) {
						    	echo "<tr>";  
						        echo "<td>".$row['User_Name']."</td>"; 
						        echo "<td>".$row['Roll']."</td>";
						        echo "<td>".$row['Dept_ID']."</td>"; 
						        echo "<td>".$row['Dept_Name']."</td>"; 
						        echo "</tr>"; 
						    }
						    echo "</table>"; 
						} 
						else {
						    echo "0 results";
						}
					}

					echo "<br><br>";

					$sql = "SELECT i.Room_No, u.User_Name, u.Roll, i.Manager_ID FROM institutions i LEFT OUTER JOIN users u ON i.User_ID=u.User_ID
						UNION ALL
						SELECT i.Room_No, u.User_Name, u.Roll, i.Manager_ID FROM institutions i RIGHT OUTER JOIN users u ON i.User_ID=
						u.User_ID WHERE i.User_ID IS NULL;";

					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Full Outer Join of Two Tables users and institutions using User_ID";
					if($result = mysqli_query($link,$sql)){
						if (mysqli_num_rows($result) > 0) {
						    echo "<table>"; 
						    echo "<tr>"; 
						    echo "<th>Room_No</th>";
						    echo "<th>User_Name</th>";
						    echo "<th>Roll</th>";
						    echo "<th>Manager_ID</th>"; 
						    echo "</tr>";
						    while($row = mysqli_fetch_array($result)) {
						    	echo "<tr>";  
						    	echo "<td>".$row['Room_No']."</td>";
						        echo "<td>".$row['User_Name']."</td>"; 
						        echo "<td>".$row['Roll']."</td>";
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

					?>
                </div>
            </div>
        </div>
    </body>
</html>

