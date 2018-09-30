<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePbillItemsTableTriggers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Insert trigger in pbill_item
        DB::unprepared("
            CREATE TRIGGER `update_rt_pbill` AFTER INSERT ON `pbill_items`
            FOR EACH ROW
            BEGIN
        
                UPDATE `items` SET 
                `i_quantity` = `i_quantity` + NEW.quantity 
                WHERE item_id = NEW.item_id;
                
                SELECT @i_cur_cp_query := i_cur_cp into @i_cur_cp from items WHERE item_id = NEW.item_id;
            
                IF (@i_cur_cp != NEW.rate) THEN
                    UPDATE `items` SET 
                    `i_pre_cp` = `i_cur_cp`
                    WHERE item_id = NEW.item_id;
        
                    UPDATE `items` SET 
                    `i_cur_cp` = NEW.rate
                    WHERE item_id = NEW.item_id;
        
                    UPDATE `items` SET 
                    `i_date_of_change_of_price` = curdate()
                    WHERE item_id = NEW.item_id;
                END IF;
        
                
        
            END
        ");
        // Delete trigger in pbill_item
        DB::unprepared("
        CREATE TRIGGER `delete_rt_pbill` AFTER DELETE ON `pbill_items`
        FOR EACH ROW
        BEGIN
    
            UPDATE `items` SET 
            `i_quantity` = `i_quantity` - OLD.quantity 
            WHERE item_id = OLD.item_id;
            
            SELECT @i_pre_cp_query := i_pre_cp into @i_pre_cp from items WHERE item_id = OLD.item_id;
           
            IF (@i_cur_cp != OLD.rate) THEN
                UPDATE `items` SET 
                `i_cur_cp` = `i_pre_cp`
                WHERE item_id = OLD.item_id;
    
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
       DB::unprepared("DROP TRIGGER if exists `update_rt_pbill`");
    }
}
