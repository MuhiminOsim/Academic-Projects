<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcedure extends Migration
{
    public function up()
    {
        DB::unprepared('CREATE PROCEDURE insertUser(IN _name VARCHAR(30), IN _roll INT(10),IN _batch INT(10), IN _dept INT(10)) 
        BEGIN 
            INSERT INTO users (User_Name, Roll, Batch, Dept_ID) VALUES (_name, _roll, _batch, _dept);
        END');
    }

    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS get_highscore');
    }
}
