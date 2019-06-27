<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        DB::unprepared('
        CREATE FUNCTION check (hour INT)
            RETURNS VARCHAR(15)
            RETURN 
                CASE
                    WHEN hour > 20 THEN "BAD"
                    WHEN hour <=20 THEN "GOOD"
                END
        ');

        DB::unprepared('CREATE TRIGGER time_check BEFORE INSERT ON `access` FOR EACH ROW
                BEGIN
                   IF check(HOUR(NEW.Access_Time)+NEW.Access_Duration)=="BAD"
                   THEN signal sqlstate "45000" set message_text = "Access Time will be exceeded after 20:00!";
                   END IF;
                END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `time_check`');
    }
}
