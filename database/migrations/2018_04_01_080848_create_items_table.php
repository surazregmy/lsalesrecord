<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('item_id');
            $table->string('item_name')->unique();
            $table->string('i_category');
            $table->integer('i_quantity');
            $table->float('i_pre_cp')->default(0);
            $table->float('i_pre_sp')->default(0);
            $table->float('i_cur_cp');
            $table->float('i_cur_sp');
            $table->float('i_pre_dp')->default(0);
            $table->float('i_cur_dp');
            $table->integer('i_low_flag');
            $table->date('i_date_of_change_of_price')->default('1999-12-31');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
