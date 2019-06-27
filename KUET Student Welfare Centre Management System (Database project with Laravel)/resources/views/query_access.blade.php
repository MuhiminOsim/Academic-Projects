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

            .Query-Access {
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
                    Query on Access Table
                </div>
                <div class="Query-Access">
                	<center>
					<form method="post" action="">
						@csrf
						Access_ID: <input type="text" name="id">
						Access_Date(yyyy-mm-dd): <input type="text" name="date">
						Access_Time(hh:mm:ss): <input type="text" name="time">
						Access_Duration: <input type="text" name="duration"><br>
						<input type="submit" name="submit" value="submit"> 
					</form>
					<?php
						if(isset($_POST['submit'])){
							$id= $_POST['id'];
							$date= $_POST['date'];
							$time= $_POST['time'];
							$duration= $_POST['duration'];
							$sql= "SELECT * FROM access";
							if($id!='' || $date!='' || $time!='' || $duration!=''){
								$sql.=" WHERE ";
							}
							$v=0;
							if($id!=''){
								$sql.=" Access_ID = ";
								$sql.=$id;
								$v=1;
							}
							if($date!=''){
								if($v==0){
									$sql.=" Access_Date = ";
									$v=1;
								}
								else $sql.=" and Access_Date = ";
								$sql.="'".$date."'";
							}
							if($time!=''){
								if($v==0){
									$sql.="Access_Time = ";
									$v=1;
								}
								else $sql.=" and Access_Time = ";
								$sql.=$time;
							}
							if($duration!=''){
								if($v==0){
									$sql.="Access_Duration = ";
									$v=1;
								}
								else $sql.=" and Access_Duration = ";
								$sql.=$duration;
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
								    echo "<th>Access_ID</th>"; 
								    echo "<th>Access_Date</th>";
								    echo "<th>Access_Time</th>";
								    echo "<th>Access_Duration</th>";
								    echo "</tr>";
								    while($row = mysqli_fetch_array($result)) {
								    	echo "<tr>"; 
							 			echo "<td>".$row['Access_ID']."</td>";
							 			echo "<td>".$row['Access_Date']."</td>";	
							 			echo "<td>".$row['Access_Time']."</td>";
							 			echo "<td>".$row['Access_Duration']."</td>"; 
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
