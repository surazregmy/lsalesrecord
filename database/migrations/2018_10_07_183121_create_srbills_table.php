<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSrbillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('srbills', function (Blueprint $table) {
            $table->increments('srbill_id');
            $table->integer('creditor_id');
            $table->string('srbill_original_id');
            $table->string('srbill_generated_id');
            $table->date('sr_date_of_ret');
            $table->string('sr_date_of_ret_n');
            $table->string('sr_entered_by');
            $table->float('sr_total_amount');
            $table->longText('comment')->nullable();
            $table->timestamps();
            $table->unique('srbill_generated_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('srbills');
    }
}
