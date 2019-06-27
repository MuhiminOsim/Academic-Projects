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

            .Insertion {
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
                    echo "<br><br><br>";
                ?>
                <div class="links">
                    <a href="http://www.localhost:8000">Back to Home</a>
                </div>
                <?php
                    echo "<br><br><br><br>";
                ?>
                <div class="title m-b-md">
                    Insertion
                </div>
                <div class="Insertion">
                    <div class="links">
                        <a href="http://www.localhost:8000/insert_user">Users</a>
                        <a href="http://www.localhost:8000/insert_manager">Managers</a>
                        <a href="http://www.localhost:8000/insert_access">Access</a>
                        <a href="http://www.localhost:8000/insert_department">Departments</a>
                        <a href="http://www.localhost:8000/insert_institution_type">Institution Types</a>
                        <a href="http://www.localhost:8000/insert_institution">Institutions</a>
                    </div>
                    <?php
                    /*
                    require('C:\xampp\htdocs\MyProject\resources\views\database_connection.blade.php');

                    $sql = "INSERT INTO institution_types (Type_Name) VALUES ('Seminar Room')";

                    if ($link->query($sql) === TRUE) {
                        echo "data inserted into 'institution_types' successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error inserting data into table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "INSERT INTO institution_types (Type_Name) VALUES ('Conference Room')";

                    if ($link->query($sql) === TRUE) {
                        echo "data inserted into 'institution_types' successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error inserting data into table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "INSERT INTO institution_types (Type_Name) VALUES ('Muktamancha')";

                    if ($link->query($sql) === TRUE) {
                        echo "data inserted into 'institution_types' successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error inserting data into table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "INSERT INTO departments (Dept_Name) VALUES ('CSE')";

                    if ($link->query($sql) === TRUE) {
                        echo "data inserted into 'departments' successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error inserting data into table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "INSERT INTO departments (Dept_Name) VALUES ('ME')";

                    if ($link->query($sql) === TRUE) {
                        echo "data inserted into 'departments' successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error inserting data into table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "INSERT INTO departments (Dept_Name) VALUES ('EEE')";

                    if ($link->query($sql) === TRUE) {
                        echo "data inserted into 'departments' successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error inserting data into table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "INSERT INTO managers (Manager_Name,Manager_Designation) VALUES ('Dr. Shibendra Shekher Sikder','Director')";

                    if ($link->query($sql) === TRUE) {
                        echo "data inserted into 'managers' successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error inserting data into table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "INSERT INTO managers (Manager_Name,Manager_Designation) VALUES ('Shahrear Roman ','Assistant Director')";

                    if ($link->query($sql) === TRUE) {
                        echo "data inserted into 'managers' successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error inserting data into table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "INSERT INTO managers (Manager_Name,Manager_Designation) VALUES ('Ashikur Rahman','Assistant Officer')";

                    if ($link->query($sql) === TRUE) {
                        echo "data inserted into 'managers' successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error inserting data into table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "INSERT INTO access (Access_Date,Access_Time,Access_Duration) VALUES ('2019-6-02','10:00:00',3)";

                    if ($link->query($sql) === TRUE) {
                        echo "data inserted into 'access' successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error inserting data into table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "INSERT INTO access (Access_Date,Access_Time,Access_Duration) VALUES ('2019-6-10','15:00:00',3)";

                    if ($link->query($sql) === TRUE) {
                        echo "data inserted into 'access' successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error inserting data into table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "INSERT INTO access (Access_Date,Access_Time,Access_Duration) VALUES ('2019-6-25','17:00:00',3)";

                    if ($link->query($sql) === TRUE) {
                        echo "data inserted into 'access' successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error inserting data into table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "INSERT INTO users (User_Name,Roll,Batch,Dept_ID) VALUES ('Muhiminul Islam',1607087,2016,1)";

                    if ($link->query($sql) === TRUE) {
                        echo "data inserted into 'users' successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error inserting data into table: " . $link->error;
                        echo "<br>";
                    }


                    $sql = "INSERT INTO users (User_Name,Roll,Batch,Dept_ID) VALUES ('Nazmus Sakib',1505089,2015,3)";

                    if ($link->query($sql) === TRUE) {
                        echo "data inserted into 'users' successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error inserting data into table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "INSERT INTO users (User_Name,Roll,Batch,Dept_ID) VALUES ('Al Noman',1607031,2016,1)";

                    if ($link->query($sql) === TRUE) {
                        echo "data inserted into 'users' successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error inserting data into table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "INSERT INTO users (User_Name,Roll,Batch,Dept_ID) VALUES ('Radi Rahman',1603084,2016,2)";

                    if ($link->query($sql) === TRUE) {
                        echo "data inserted into 'users' successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error inserting data into table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "INSERT INTO institutions (Room_No,Type_ID,Access_ID,Manager_ID,User_ID) VALUES (201,1,1,2,1)";

                    if ($link->query($sql) === TRUE) {
                        echo "data inserted into 'institutions' successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error inserting data into table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "INSERT INTO institutions (Room_No,Type_ID,Access_ID,Manager_ID,User_ID) VALUES (102,3,3,3,1)";

                    if ($link->query($sql) === TRUE) {
                        echo "data inserted into 'institutions' successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error inserting data into table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "INSERT INTO institutions (Room_No,Type_ID,Access_ID,Manager_ID,User_ID) VALUES (102,3,2,3,3)";

                    if ($link->query($sql) === TRUE) {
                        echo "data inserted into 'institutions' successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error inserting data into table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "INSERT INTO institutions (Room_No,Type_ID,Access_ID,Manager_ID,User_ID) VALUES (202,2,2,2,2)";

                    if ($link->query($sql) === TRUE) {
                        echo "data inserted into 'institutions' successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error inserting data into table: " . $link->error;
                        echo "<br>";
                    }
                    */
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>