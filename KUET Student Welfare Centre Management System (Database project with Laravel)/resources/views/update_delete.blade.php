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

            .Update-Delete {
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
                    Update & Delete
                </div>
                <div class="Update-Delete">
                    <div class="links">
                        <a href="http://www.localhost:8000/update_delete_user">Users</a>
                        <a href="http://www.localhost:8000/update_delete_manager">Managers</a>
                        <a href="http://www.localhost:8000/update_delete_access">Access</a>
                        <a href="http://www.localhost:8000/update_delete_department">Departments</a>
                        <a href="http://www.localhost:8000/update_delete_institution_type">Institution Types</a>
                        <a href="http://www.localhost:8000/update_delete_institution">Institutions</a>
                    </div>
                    <?php
                    /*
                    require('C:\xampp\htdocs\MyProject\resources\views\database_connection.blade.php');

                    $q = "UPDATE managers SET Designation='Director' WHERE Manager_Name='Dr. Shibendra Shekher Sikder';";

                    if ($link->query($q) === TRUE) {
                        echo "'Designation' updated successfully where Manager_Name is Dr. Shibendra Shekher Sikder";
                        echo "<br><br>";
                    } else {
                        echo "Error updating 'Designation' in managers: " . $link->error;
                        echo "<br>";
                    }

                    $q = "UPDATE managers SET Designation='Assistant Director' WHERE Manager_Name='Shahrear Roman';";

                    if ($link->query($q) === TRUE) {
                        echo "'Designation' updated successfully where Manager_Name is Ashikur Rahman";
                        echo "<br><br>";
                    } else {
                        echo "Error updating 'Designation' in managers: " . $link->error;
                        echo "<br>";
                    }

                    $q = "UPDATE managers SET Designation='Assistant Officer' WHERE Manager_Name='Ashikur Rahman';";

                    if ($link->query($q) === TRUE) {
                        echo "'Designation' updated successfully where Manager_Name is Ashikur Rahman";
                        echo "<br><br>";
                    } else {
                        echo "Error updating 'Designation' in managers: " . $link->error;
                        echo "<br>";
                    }

                    $q = "UPDATE institutions SET Type_ID=1 WHERE Access_ID=1;";

                    if ($link->query($q) === TRUE) {
                        echo "'Type_ID' updated successfully where Access_ID=1";
                        echo "<br><br>";
                    } else {
                        echo "Error updating 'Designation' in managers: " . $link->error;
                        echo "<br>";
                    }

                    $q = "UPDATE institutions SET Type_ID=3 WHERE Access_ID=3;";

                    if ($link->query($q) === TRUE) {
                        echo "'Type_ID' updated successfully where Access_ID=3";
                        echo "<br><br>";
                    } else {
                        echo "Error updating 'Designation' in managers: " . $link->error;
                        echo "<br>";
                    }

                    $q = "UPDATE institutions SET Type_ID=2 WHERE Access_ID=2;";

                    if ($link->query($q) === TRUE) {
                        echo "'Type_ID' updated successfully where Access_ID=2";
                        echo "<br><br>";
                    } else {
                        echo "Error updating 'Designation' in managers: " . $link->error;
                        echo "<br>";
                    }

                    $q = "DELETE from users WHERE User_Name='Radi Rahman';";

                    if ($link->query($q) === TRUE) {
                        echo "row deleted successfully where User_Name is Radi Rahman";
                        echo "<br><br>";
                    } else {
                        echo "Error deleting a row in users: " . $link->error;
                        echo "<br>";
                    }
                    */
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>