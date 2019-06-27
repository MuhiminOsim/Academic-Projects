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

            .Table-Creation {
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
                    Table Creation
                </div>
                <div class="Table-Creation">
                    <?php

                    require('C:\xampp\htdocs\MyProject\resources\views\database_connection.blade.php');

                    $sql = "DROP TABLE if exists institutions;";

                    if ($link->query($sql) === TRUE) {
                        echo "'institutions' Table deleted successfully";
                        echo "<br>";
                    } else {
                        echo "Error deleting table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "DROP TABLE if exists users;";

                    if ($link->query($sql) === TRUE) {
                        echo "'users' Table deleted successfully";
                        echo "<br>";
                    } else {
                        echo "Error deleting table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "DROP TABLE if exists managers;";

                    if ($link->query($sql) === TRUE) {
                        echo "'managers' Table deleted successfully";
                        echo "<br>";
                    } else {
                        echo "Error deleting table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "DROP TABLE if exists access;";

                    if ($link->query($sql) === TRUE) {
                        echo "'access' Table deleted successfully";
                        echo "<br>";
                    } else {
                        echo "Error deleting table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "DROP TABLE if exists institution_types;";

                    if ($link->query($sql) === TRUE) {
                        echo "'institution_types' Table deleted successfully";
                        echo "<br>";
                    } else {
                        echo "Error deleting table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "DROP TABLE if exists departments;";

                    if ($link->query($sql) === TRUE) {
                        echo "'departments' Table deleted successfully";
                        echo "<br><br><br>";
                    } else {
                        echo "Error deleting table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "CREATE TABLE institution_types (
                    Type_ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                    Type_Name VARCHAR(30) NOT NULL
                    )";

                    if ($link->query($sql) === TRUE) {
                        echo "'institution_types' Table created successfully";
                        echo "<br>";
                        $q = mysqli_query($link,'DESCRIBE institution_types');
                        while($row = mysqli_fetch_array($q)) {
                            echo "{$row['Field']} - {$row['Type']}";
                            echo "<br>";
                        }
                        echo "<br><br><br>";
                    } else {
                        echo "Error creating table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "CREATE TABLE departments (
                    Dept_ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                    Dept_Name VARCHAR(30) NOT NULL
                    )";

                    if ($link->query($sql) === TRUE) {
                        echo "'departments' Table created successfully";
                        echo "<br>";
                        $q = mysqli_query($link,'DESCRIBE departments');
                        while($row = mysqli_fetch_array($q)) {
                            echo "{$row['Field']} - {$row['Type']}";
                            echo "<br>";
                        }
                        echo "<br><br><br>";
                    } else {
                        echo "Error creating table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "CREATE TABLE access (
                    Access_ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                    Access_Date Date NOT NULL,
                    Access_Time Time NOT NULL,
                    Access_Duration INT(10) NOT NULL
                    )";

                    if ($link->query($sql) === TRUE) {
                        echo "'access Table' created successfully";
                        echo "<br>";
                        $q = mysqli_query($link,'DESCRIBE access');
                        while($row = mysqli_fetch_array($q)) {
                            echo "{$row['Field']} - {$row['Type']}";
                            echo "<br>";
                        }
                        echo "<br><br><br>";
                    } else {
                        echo "Error creating table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "CREATE TABLE managers (
                    Manager_ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                    Manager_Name VARCHAR(30) NOT NULL,
                    Manager_Designation VARCHAR(25) NOT NULL
                    )";

                    if ($link->query($sql) === TRUE) {
                        echo "'managers Table' created successfully";
                        echo "<br>";
                        $q = mysqli_query($link,'DESCRIBE managers');
                        while($row = mysqli_fetch_array($q)) {
                            echo "{$row['Field']} - {$row['Type']}";
                            echo "<br>";
                        }
                        echo "<br><br><br>";
                    } else {
                        echo "Error creating table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "CREATE TABLE users (
                    User_ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                    User_Name VARCHAR(30),
                    Roll INT(10),
                    Batch INT(10) NOT NULL,
                    Dept_ID INT(10) UNSIGNED NOT NULL,
                    FOREIGN KEY (Dept_ID) REFERENCES departments (Dept_ID) ON DELETE CASCADE ON UPDATE CASCADE,
                    UNIQUE(Roll)
                    )";

                    if ($link->query($sql) === TRUE) {
                        echo "'users Table' created successfully";
                        echo "<br>";
                        $q = mysqli_query($link,'DESCRIBE users');
                        while($row = mysqli_fetch_array($q)) {
                            echo "{$row['Field']} - {$row['Type']}";
                            echo "<br>";
                        }
                        echo "<br><br><br>";
                    } else {
                        echo "Error creating table: " . $link->error;
                        echo "<br>";
                    }

                    $sql = "CREATE TABLE institutions (
                    Institution_ID INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                    Room_No INT(10) NOT NULL,
                    Type_ID INT(10) UNSIGNED NOT NULL,
                    Access_ID INT(10) UNSIGNED NOT NULL,
                    Manager_ID INT(10) UNSIGNED NOT NULL,
                    User_ID INT(10) UNSIGNED NOT NULL,
                    FOREIGN KEY (Manager_ID) REFERENCES managers (Manager_ID) ON DELETE CASCADE ON UPDATE CASCADE,
                    FOREIGN KEY (Type_ID) REFERENCES institution_types (Type_ID) ON DELETE CASCADE ON UPDATE CASCADE,
                    FOREIGN KEY (User_ID) REFERENCES users (User_ID) ON DELETE CASCADE ON UPDATE CASCADE,
                    FOREIGN KEY (Access_ID) REFERENCES access (Access_ID) ON DELETE CASCADE ON UPDATE CASCADE
                    )";

                    if ($link->query($sql) === TRUE) {
                        echo "'institutions' Table created successfully";
                        echo "<br>";
                        $q = mysqli_query($link,'DESCRIBE institutions');
                        while($row = mysqli_fetch_array($q)) {
                            echo "{$row['Field']} - {$row['Type']}";
                            echo "<br>";
                        }
                        echo "<br><br><br>";
                    } else {
                        echo "Error creating table: " . $link->error;
                        echo "<br>";
                    }
                    mysqli_close($link);
                    ?>                   
                </div>
            </div>
        </div>
    </body>
</html>