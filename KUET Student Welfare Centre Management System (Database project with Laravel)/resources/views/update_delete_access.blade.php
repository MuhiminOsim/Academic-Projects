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

            .Update-Access {
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
                    <a href="http://www.localhost:8000/update_delete">Back to Update & Delete</a>
                </div>
                <?php
                    echo "<br>";
                ?>
                <div class="title m-b-md">
                    Update/Delete on Access Table
                </div>
                <div class="Update-Access">
                	<center>
					<form method="post" action="">
						@csrf
						Search for update/delete:
						Access_ID: <input type="text" name="id1">
						Access_Date: <input type="text" name="date1">
						Access_Time: <input type="text" name="time1">
						Access_Duration: <input type="text" name="duration1"><br>
						Update to:
						Access_ID: <input type="text" name="id2">
						Access_Date: <input type="text" name="date2">
						Access_Time: <input type="text" name="time2">
						Access_Duration: <input type="text" name="duration2"><br>
						Options: <input type="radio" name="option" value="update">Update
						<input type="radio" name="option" value="delete">Delete<br>
						<input type="submit" name="submit" value="submit"> 
					</form>
					<?php
						if(isset($_POST['submit'])){
							$id1= $_POST['id1'];
							$date1= $_POST['date1'];
							$time1= $_POST['time1'];
							$duration1= $_POST['duration1'];
							$id2= $_POST['id2'];
							$date2= $_POST['date2'];
							$time2= $_POST['time2'];
							$duration2= $_POST['duration2'];
							$option=$_POST['option'];
							$sql="";
							if($option=="delete") $sql.= "DELETE FROM access ";
							else {
								$sql.= "UPDATE access SET ";
								$v=0;
								if($id2!=''){
									if($v==0){
										$sql.=" Access_ID = ".$id2;
										$v=1;
									}
									else $sql.=" , Access_ID = ".$id2;
								}
								if($date2!=''){
									if($v==0){
										$sql.=" Access_Date = ".$date2;
										$v=1;
									}
									else $sql.=" , Access_Date = ".$date2;
								}
								if($time2!=''){
									if($v==0){
										$sql.=" Access_Time = ".$time2;
										$v=1;
									}
									else $sql.=" , Roll = ".$time2;
								}
								if($duration2!=''){
									if($v==0){
										$sql.=" Access_Duration = ".$duration2;
										$v=1;
									}
									else $sql.=" , Access_Duration = ".$duration2;
								}
							}
							$sql.=" WHERE ";
							$v=0;
							if($id1!=''){
								$sql.=" Access_ID = ";
								$sql.=$id1;
								$v=1;
							}
							if($date1!=''){
							if($v==0){
									$sql.=" Access_Date = ";
									$v=1;
								}
								else $sql.=" and Access_Date = ";
								$sql.="'".$date1."'";
							}
							if($time1!=''){
								if($v==0){
									$sql.=" Access_Time = ";
									$v=1;
								}
								else $sql.=" and Access_Time = ";
								$sql.=$time1;
							}
							if($duration1!=''){
								if($v==0){
									$sql.="Access_Duration = ";
									$v=1;
								}
								else $sql.=" and Access_Duration = ";
								$sql.=$duration1;
							}
							$sql.=";";
							require('C:\xampp\htdocs\MyProject\resources\views\database_connection.blade.php');
							echo "<br><br><br>";
							if ($link->query($sql) === TRUE) {
			                    echo "value(s) update/row(s) deleted on 'access' table successfully!";
			                    echo "<br><br>";
			                } else {
			                    echo "Error updating on/ deleting from 'access' table: " . $link->error;
			                    echo "<br>";
			               	}
						}
					?>
                </div>
            </center>
            </div>
        </div>
    </body>
</html>
