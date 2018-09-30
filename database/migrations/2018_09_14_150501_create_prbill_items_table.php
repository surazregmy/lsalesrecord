<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrbillItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prbill_items', function (Blueprint $table) {
            $table->increments('prbillitem_id');
            $table->integer('prbill_id');
            $table->integer('item_id');
            $table->float('quantity');
            $table->float('rate');
            $table->float('total');
            $table->timestamps();
            $table->unique(['prbill_id','item_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prbill_items');
    }
}
