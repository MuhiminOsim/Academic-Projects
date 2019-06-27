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

            .Modification {
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
                    Modification
                </div>
                <div class="Modification">
                    <?php

                    require('C:\xampp\htdocs\MyProject\resources\views\database_connection.blade.php');

                    $q = "ALTER TABLE managers
                    DROP COLUMN Manager_Designation;";

                    if ($link->query($q) === TRUE) {
                        echo "'Manager Designation' column deleted from managers successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error deleting column 'Manager_Designation' from table: " . $link->error;
                        echo "<br>";
                    }

                    $q = "ALTER TABLE managers
                    ADD Designation VARCHAR(25);";

                    if ($link->query($q) === TRUE) {
                        echo "'Designation' column added to managers successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error adding column 'Manager_Designation' into table: " . $link->error;
                        echo "<br>";
                    }

                    $q = "ALTER TABLE users
                    MODIFY COLUMN Batch INT(5);";

                    if ($link->query($q) === TRUE) {
                        echo "'Batch' column in users modified successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error modifying column 'Batch': " . $link->error;
                        echo "<br>";
                    }

                    $q = "ALTER TABLE institutions
                    DROP FOREIGN KEY institutions_ibfk_2;";

                    if ($link->query($q) === TRUE) {
                        echo "constraint named 'institutions_ibfk_2' deleted from institutions successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error deleting 'constrant1' from institutions: " . $link->error;
                        echo "<br>";
                    }

                    $q = "ALTER TABLE institutions
                    DROP COLUMN Type_ID;";

                    if ($link->query($q) === TRUE) {
                        echo "'Type_ID' column deleted from institutions successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error deleting column 'Type_ID' from institutions: " . $link->error;
                        echo "<br>";
                    }


                    $q = "ALTER TABLE institutions
                    ADD Type_ID INT(10) UNSIGNED;";

                    if ($link->query($q) === TRUE) {
                        echo "'Type_ID' column added to institutions successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error adding column 'Type_ID' into institutions: " . $link->error;
                        echo "<br>";
                    }

                    $q = "ALTER TABLE institutions ADD CONSTRAINT constraint1
                    FOREIGN KEY (Type_ID) REFERENCES institution_types (Type_ID) ON DELETE CASCADE ON UPDATE CASCADE";

                    if ($link->query($q) === TRUE) {
                        echo "'Type_ID' column added to institutions successfully";
                        echo "<br><br>";
                    } else {
                        echo "Error adding column 'Type_ID' into institutions: " . $link->error;
                        echo "<br>";
                    }

                    ?>
                </div>
            </div>
        </div>
    </body>
</html>