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

            .Query-User-Institution {
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
                    Query on Full Outer Join of Users & Institutions
                </div>
                <div class="Query-User-Institution">
                	<center>
					<form method="post" action="">
						@csrf
						User_ID: <input type="text" name="id">
						User_Name: <input type="text" name="name">
						Roll: <input type="text" name="roll">
						Batch: <input type="text" name="batch"><br>
						Dept_ID: <input type="text" name="dept_id">
						Institution_ID: <input type="text" name="institution">
						Room No.: <input type="text" name="room"><br>
						Access_ID: <input type="text" name="access">
						Manager_ID: <input type="text" name="manager">
						Type_ID: <input type="text" name="type"><br>
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
							$institution= $_POST['institution'];
							$room= $_POST['room'];
							$access= $_POST['access'];
							$manager= $_POST['manager'];
							$type= $_POST['type'];
							$sql= "SELECT * FROM (SELECT u.User_ID,u.User_Name,u.Roll,u.Batch,u.Dept_ID,i.Institution_ID,i.Room_No,i.Access_ID,i.Manager_ID,i.Type_ID FROM institutions i LEFT OUTER JOIN users u ON i.User_ID=u.User_ID
						UNION ALL
						SELECT u.User_ID,u.User_Name,u.Roll,u.Batch,u.Dept_ID,i.Institution_ID,i.Room_No,i.Access_ID,i.Manager_ID,i.Type_ID FROM institutions i RIGHT OUTER JOIN users u ON i.User_ID=
						u.User_ID WHERE i.User_ID IS NULL) sq";
							if($id!='' || $name!='' || $roll!='' || $batch!='' || $dept_id!='' || $institution!='' || $room!='' || $access!='' || $manager!='' || $type!=''){
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
							if($institution!=''){
								if($v==0){
									$sql.=" Institution_ID = ";
									$v=1;
								}
								else $sql.=" and Institution_ID = ";
								$sql.="'".$institution."'";
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
							if($type!=''){
								if($v==0){
									$sql.="Type_ID = ";
									$v=1;
								}
								else $sql.=" and Type_ID = ";
								$sql.=$type;
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
								    echo "<th>Institution_ID</th>"; 
								    echo "<th>Room_No</th>";
								    echo "<th>Access_ID</th>";
								    echo "<th>Manager_ID</th>";
								    echo "<th>Type_ID</th>";
								    echo "</tr>";
								    while($row = mysqli_fetch_array($result)) {
								    	echo "<tr>"; 
							 			echo "<td>".$row['User_ID']."</td>";
							 			echo "<td>".$row['User_Name']."</td>";	
							 			echo "<td>".$row['Roll']."</td>";
							 			echo "<td>".$row['Batch']."</td>";
								        echo "<td>".$row['Dept_ID']."</td>"; 
								        echo "<td>".$row['Institution_ID']."</td>";
							 			echo "<td>".$row['Room_No']."</td>";	
							 			echo "<td>".$row['Access_ID']."</td>";
							 			echo "<td>".$row['Manager_ID']."</td>";
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
