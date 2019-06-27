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

            .Update-Institution {
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
                    Update/Delete on Institutions Table
                </div>
                <div class="Update-Institution">
                	<center>
					<form method="post" action="">
						@csrf
						Search for update/delete:
						Institution_ID: <input type="text" name="id1">
						Room_No: <input type="text" name="room1">
						Access_ID: <input type="text" name="access1"><br>
						Manager_ID: <input type="text" name="manager1">
						User_ID: <input type="text" name="user1">
						Type_ID: <input type="text" name="type1"><br>
						Update to:
						Institution_ID: <input type="text" name="id2">
						Room_No: <input type="text" name="room2">
						Access_ID: <input type="text" name="access2"><br>
						Manager_ID: <input type="text" name="manager2">
						User_ID: <input type="text" name="user2">
						Type_ID: <input type="text" name="type2"><br>
						Options: <input type="radio" name="option" value="update">Update
						<input type="radio" name="option" value="delete">Delete<br>
						<input type="submit" name="submit" value="submit"> 
					</form>
					<?php
						if(isset($_POST['submit'])){
							$id1= $_POST['id1'];
							$room1= $_POST['room1'];
							$access1= $_POST['access1'];
							$manager1= $_POST['manager1'];
							$user1= $_POST['user1'];
							$type1= $_POST['type1'];
							$id2= $_POST['id2'];
							$room2= $_POST['room2'];
							$access2= $_POST['access2'];
							$manager2= $_POST['manager2'];
							$user2= $_POST['user2'];
							$type2= $_POST['type2'];
							$option=$_POST['option'];
							$sql="";
							if($option=="delete") $sql.= "DELETE FROM institutions ";
							else {
								$sql.= "UPDATE institutions SET ";
								$v=0;
								if($id2!=''){
									if($v==0){
										$sql.=" Institution_ID = ".$id2;
										$v=1;
									}
									else $sql.=" , Institution_ID = ".$id2;
								}
								if($room2!=''){
									if($v==0){
										$sql.=" Room_No = ".$room2;
										$v=1;
									}
									else $sql.=" , Room_No = ".$room2;
								}
								if($access2!=''){
									if($v==0){
										$sql.=" Access_ID = ".$access2;
										$v=1;
									}
									else $sql.=" , Access_ID = ".$access2;
								}
								if($manager2!=''){
									if($v==0){
										$sql.=" Manager_ID = ".$manager2;
										$v=1;
									}
									else $sql.=" , Manager_ID = ".$manager2;
								}
								if($user2!=''){
									if($v==0){
										$sql.=" User_ID = ".$user2;
										$v=1;
									}
									else $sql.=" , User_ID = ".$user2;
								}
								if($type2!=''){
									if($v==0){
										$sql.=" Type_ID = ".$type2;
										$v=1;
									}
									else $sql.=" , Type_ID = ".$type2;
								}
							}
							$sql.=" WHERE ";
							$v=0;
							if($id1!=''){
								$sql.=" Institution_ID = ";
								$sql.=$id1;
								$v=1;
							}
							if($room1!=''){
							if($v==0){
									$sql.=" Room_No = ";
									$v=1;
								}
								else $sql.=" and Room_No = ";
								$sql.="'".$room1."'";
							}
							if($access1!=''){
								if($v==0){
									$sql.="Access_ID = ";
									$v=1;
								}
								else $sql.=" and Access_ID = ";
								$sql.=$access1;
							}
							if($manager1!=''){
								if($v==0){
									$sql.="Manager_ID = ";
									$v=1;
								}
								else $sql.=" and Manager_ID = ";
								$sql.=$manager1;
							}
							if($user1!=''){
								if($v==0){
									$sql.="User_ID = ";
									$v=1;
								}
								else $sql.=" and User_ID = ";
								$sql.=$user1;
							}
							if($type1!=''){
								if($v==0){
									$sql.="Type_ID = ";
									$v=1;
								}
								else $sql.=" and Type_ID = ";
								$sql.=$type1;
							}
							$sql.=";";
							require('C:\xampp\htdocs\MyProject\resources\views\database_connection.blade.php');
							echo "<br><br><br>";
							if ($link->query($sql) === TRUE) {
			                    echo "value(s) update/row(s) deleted on 'institutions' table successfully!";
			                    echo "<br><br>";
			                } else {
			                    echo "Error updating on/ deleting from 'institutions' table: " . $link->error;
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
