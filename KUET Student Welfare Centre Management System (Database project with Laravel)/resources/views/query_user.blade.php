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

            .Query-User {
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
                    Query on Users Table
                </div>
                <div class="Query-User">
                	<center>
					<form method="post" action="">
						@csrf
						User_ID: <input type="text" name="id">
						User_Name: <input type="text" name="name">
						Roll: <input type="text" name="roll">
						Batch: <input type="text" name="batch">
						Dept_ID: <input type="text" name="dept_id"><br>
						Order By User_ID: <input type="radio" name="order" value="asc">Ascending
						<input type="radio" name="order" value="desc">Descending<br>
						<input type="submit" name="submit" value="submit"> 
					</form>
					<?php
						if(isset($_POST['submit'])){
							$id= $_POST['id'];
							$name= $_POST['name'];
							$roll= $_POST['roll'];
							$batch= $_POST['batch'];
							$dept_id= $_POST['dept_id'];
							$sql= "SELECT * FROM users";
							if($id!='' || $name!='' || $roll!='' || $batch!='' || $dept_id!=''){
								$sql.=" WHERE ";
							}
							$v=0;
							if($id!=''){
								$sql.=" User_ID = ";
								$sql.=$id;
								$v=1;
							}
							if($name!=''){
								if($v==0){
									$sql.=" User_Name = ";
									$v=1;
								}
								else $sql.=" and User_Name = ";
								$sql.="'".$name."'";
							}
							if($roll!=''){
								if($v==0){
									$sql.="Roll = ";
									$v=1;
								}
								else $sql.=" and Roll = ";
								$sql.=$roll;
							}
							if($batch!=''){
								if($v==0){
									$sql.="Batch = ";
									$v=1;
								}
								else $sql.=" and Batch = ";
								$sql.=$batch;
							}
							if($dept_id!=''){
								if($v==0){
									$sql.="Dept_ID = ";
									$v=1;
								}
								else $sql.=" and Dept_ID = ";
								$sql.=$dept_id;
							}
							if(isset($_POST['order'])){
								$order = $_POST['order'];
								if($order=="desc"){
									$sql.=" ORDER BY User_ID desc";
								}
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
								    echo "<th>User_ID</th>"; 
								    echo "<th>User_Name</th>";
								    echo "<th>Roll</th>";
								    echo "<th>Batch</th>";
								    echo "<th>Dept_ID</th>";
								    echo "</tr>";
								    while($row = mysqli_fetch_array($result)) {
								    	echo "<tr>"; 
							 			echo "<td>".$row['User_ID']."</td>";
							 			echo "<td>".$row['User_Name']."</td>";	
							 			echo "<td>".$row['Roll']."</td>";
							 			echo "<td>".$row['Batch']."</td>";
								        echo "<td>".$row['Dept_ID']."</td>"; 
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
