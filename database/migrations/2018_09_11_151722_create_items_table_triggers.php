<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTableTriggers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       // Update Item :: Log table
       DB::unprepared("
       CREATE TRIGGER `update_item` AFTER UPDATE on `items`
       FOR EACH ROW
       BEGIN
           IF (NEW.item_name != OLD.item_name) THEN
               insert into log_table(eventdescription,table1,column1,row_id,oldvalue,newvalue,action1,updated_at)
               values ('Update Item','Item','item_name',new.item_id,OLD.item_name,new.item_name,'UPDATE',curdate());
           END IF;
           IF (NEW.i_category != OLD.i_category) THEN
               insert into log_table(eventdescription,table1,column1,row_id,oldvalue,newvalue,action1,updated_at)
               values ('Update Item','Item','i_category',new.item_id,OLD.i_category,new.i_category,'UPDATE',curdate());
           END IF;
           IF (NEW.i_quantity != OLD.i_quantity) THEN
               insert into log_table(eventdescription,table1,column1,row_id,oldvalue,newvalue,action1,updated_at)
               values ('Update Item','Item','i_quantity',new.item_id,OLD.i_quantity,new.i_quantity,'UPDATE',curdate());
           END IF;
           IF (NEW.i_cur_cp != OLD.i_cur_cp) THEN
               insert into log_table(eventdescription,table1,column1,row_id,oldvalue,newvalue,action1,updated_at)
               values ('Update Item','Item','i_cur_cp',new.item_id,OLD.i_cur_cp,new.i_cur_cp,'UPDATE',curdate());
           END IF;
           IF (NEW.i_cur_sp != OLD.i_cur_sp) THEN
               insert into log_table(eventdescription,table1,column1,row_id,oldvalue,newvalue,action1,updated_at)
               values ('Update Item','Item','i_cur_sp',new.item_id,OLD.item_name,new.item_name,'UPDATE',curdate());
           END IF;
           IF (NEW.i_cur_dp != OLD.i_cur_dp) THEN
               insert into log_table(eventdescription,table1,column1,row_id,oldvalue,newvalue,action1,updated_at)
               values ('Update Item','Item','i_cur_dp',new.item_id,OLD.i_cur_dp,new.i_cur_dp,'UPDATE',curdate());
           END IF;             
           IF (NEW.i_low_flag != OLD.i_low_flag) THEN
               insert into log_table(eventdescription,table1,column1,row_id,oldvalue,newvalue,action1,updated_at)
               values ('Update Item','Item','i_low_flag',OLD.i_low_flag,new.i_low_flag,'UPDATE',curdate());
           END IF;
   
       END
       ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB:: unprepared("DROP TRIGGER if exists `update_item`");
    }
}
