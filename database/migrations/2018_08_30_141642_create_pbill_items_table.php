<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePbillItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pbill_items', function (Blueprint $table) {
            $table->increments('pbillitem_id');
            $table->integer('pbill_id');
            $table->integer('item_id');
            $table->float('quantity');
            $table->float('rate');
            $table->float('total');
            $table->timestamps();
            $table->unique(['pbill_id','item_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pbill_items');
    }
}
