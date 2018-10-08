<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSrbillItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('srbill_items', function (Blueprint $table) {
            $table->integer('srbill_id');
            $table->integer('item_id');
            $table->float('quantity');
            $table->float('rate');
            $table->float('discount');
            $table->float('total');
            $table->timestamps();
            $table->unique(['srbill_id','item_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('srbill_items');
    }
}
