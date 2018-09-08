<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePbillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pbills', function (Blueprint $table) {
            $table->increments('pbill_id');
            $table->integer('debtor_id');
            $table->string('pbill_original_id')->unique();
            $table->date('p_date_of_purchase');
            $table->string('p_date_of_purchase_n');
            $table->string('p_entered_by');
            $table->float('p_total_amount');
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
        Schema::dropIfExists('pbills');
    }
}
