<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrbillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Prbills', function (Blueprint $table) {
            $table->increments('prbill_id');
            $table->integer('debtor_id');
            $table->string('prbill_original_id');
            $table->string('prbill_generated_id');
            $table->date('pr_date_of_purchase');
            $table->string('pr_date_of_purchase_n');
            $table->string('pr_entered_by');
            $table->float('pr_total_amount');
            $table->unique( array('debtor_id','prbill_generated_id') );
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
        Schema::dropIfExists('Prbills');
    }
}
