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

            .Update-Department {
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
                    Update/Delete on Departments Table
                </div>
                <div class="Update-Department">
                	<center>
					<form method="post" action="">
						@csrf
						Search for update/delete:
						Dept_ID: <input type="text" name="id1">
						Dept_Name: <input type="text" name="name1"><br>
						Update to:
						Dept_ID: <input type="text" name="id2">
						Dept_Name: <input type="text" name="name2"><br>
						Options: <input type="radio" name="option" value="update">Update
						<input type="radio" name="option" value="delete">Delete<br>
						<input type="submit" name="submit" value="submit"> 
					</form>
					<?php
						if(isset($_POST['submit'])){
							$id1= $_POST['id1'];
							$name1= $_POST['name1'];
							$id2= $_POST['id2'];
							$name2= $_POST['name2'];
							$option=$_POST['option'];
							$sql="";
							if($option=="delete") $sql.= "DELETE FROM departments ";
							else {
								$sql.= "UPDATE departments SET ";
								$v=0;
								if($id2!=''){
									if($v==0){
										$sql.=" Dept_ID = ".$id2;
										$v=1;
									}
									else $sql.=" , Dept_ID = ".$id2;
								}
								if($name2!=''){
									if($v==0){
										$sql.=" Dept_Name = ".$name2;
										$v=1;
									}
									else $sql.=" , Dept_Name = ".$name2;
								}
							}
							$sql.=" WHERE ";
							$v=0;
							if($id1!=''){
								$sql.=" Dept_ID = ";
								$sql.=$id1;
								$v=1;
							}
							if($name1!=''){
								if($v==0){
									$sql.=" Dept_Name = ";
									$v=1;
								}
								else $sql.=" and Dept_Name = ";
								$sql.="'".$name1."'";
							}
							$sql.=";";
							require('C:\xampp\htdocs\MyProject\resources\views\database_connection.blade.php');
							echo "<br><br><br>";
							if ($link->query($sql) === TRUE) {
			                    echo "value(s) update/row(s) deleted on 'departments' table successfully!";
			                    echo "<br><br>";
			                } else {
			                    echo "Error updating on/ deleting from 'departments' table: " . $link->error;
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
