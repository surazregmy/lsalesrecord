<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogTableProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
                    CREATE  PROCEDURE `insert_into_log`(
                                                IN eventDescription varchar(255),
                                                IN table1 varchar(50),
                                                IN column1 varchar(50),
                                                IN row_id varchar(50),
                                                IN oldvalue varchar(50),
                                                IN newvalue varchar(50),
                                                IN action1 varchar(50),
                                                IN user1 varchar(50))
                    BEGIN
                    
                            SET @insert_query = concat("insert into log_table(
                                                        eventdescription,
                                                        table1,
                                                        column1,
                                                        row_id,
                                                        oldvalue,
                                                        newvalue,
                                                        action1,
                                                        user1
                                                        )
                                                        VALUES(\'",eventDescription,"\',\'",table1,"\',\'",column1,"\',\'",row_id,"\',\'",OldValue,"\',\'",newvalue,"\',\'",action1,"\',\'",user1,"\')
                                                        ");
                            PREPARE stmt FROM @insert_query;
                            EXECUTE stmt;

                    END '
                            );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS `insert_into_log`');
    }
}
