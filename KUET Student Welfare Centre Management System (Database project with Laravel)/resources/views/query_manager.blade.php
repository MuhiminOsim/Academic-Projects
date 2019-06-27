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

            .Query-Manager {
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
                    Query on Managers Table
                </div>
                <div class="Query-Manager">
                	<center>
					<form method="post" action="">
						@csrf
						Manager_ID: <input type="text" name="id">
						Manager_Name: <input type="text" name="name">
						Designation: <input type="text" name="designation"><br>
						<input type="submit" name="submit" value="submit"> 
					</form>
					<?php
						if(isset($_POST['submit'])){
							$id= $_POST['id'];
							$name= $_POST['name'];
							$designation= $_POST['designation'];
							$sql= "SELECT * FROM managers";
							if($id!='' || $name!='' || $designation!=''){
								$sql.=" WHERE ";
							}
							$v=0;
							if($id!=''){
								$sql.=" Manager_ID = ";
								$sql.=$id;
								$v=1;
							}
							if($name!=''){
								if($v==0){
									$sql.=" Manager_Name = ";
									$v=1;
								}
								else $sql.=" and Manager_Name = ";
								$sql.="'".$name."'";
							}
							if($designation!=''){
								if($v==0){
									$sql.="Designation = ";
									$v=1;
								}
								else $sql.=" and Designation = ";
								$sql.=$designation;
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
								    echo "<th>Manager_ID</th>"; 
								    echo "<th>Manager_Name</th>";
								    echo "<th>Designation</th>";
								    echo "</tr>";
								    while($row = mysqli_fetch_array($result)) {
								    	echo "<tr>"; 
							 			echo "<td>".$row['Manager_ID']."</td>";
							 			echo "<td>".$row['Manager_Name']."</td>";	
							 			echo "<td>".$row['Designation']."</td>"; 
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
