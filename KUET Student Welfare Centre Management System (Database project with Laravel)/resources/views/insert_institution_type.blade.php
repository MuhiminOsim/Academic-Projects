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

            .Insert-Institution-Type {
                margin-bottom: 15px;
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
                    <a href="http://www.localhost:8000/insertion">Back to Insertion</a>
                </div>
                <?php
                    echo "<br>";
                ?>
                <div class="title m-b-md">
                    Insert Institution Type
                </div>
                <div class="Insert-Institution-Type">
                    <center>
                    <form action="" method="POST">
                    @csrf
                    <table width="300" height="150">
                    <tr> <td>Type Name:</td><td> <input type="text" name="name"></td></tr>
                    <tr> <td colspan="5" align="center"><input type="submit" name="insert" value="insert"></td></tr>
                    </form>
                    </center>
                    <?php
                        require('C:\xampp\htdocs\MyProject\resources\views\database_connection.blade.php');
                        if(isset($_POST['insert'])){
                            $name = $_POST['name'];
                            $sql = "INSERT INTO institution_types (Type_Name) VALUES ('$name')";
                            if($name==''){
                                echo "All Field must be filled up!";
                            }
                            else if ($link->query($sql) === TRUE) {
                                echo "Data inserted into 'institution_types' successfully";
                                echo "<br><br>";
                            } else {
                                echo "Error inserting data into table: " . $link->error;
                                 echo "<br>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>