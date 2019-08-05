<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDsbillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dsbills', function (Blueprint $table) {
            $table->increments('sbill_id');
            $table->string('creditor_name')->nullable();
            $table->string('sbill_original_id');
            $table->string('sbill_generated_id');
            $table->string('sbill_type');
            $table->string('status')->nullable();
            $table->string('date_status')->nullable();
            $table->date('s_date_of_sale');
            $table->string('s_date_of_sale_n');
            $table->string('s_entered_by');
            $table->float('s_sub_total_amount');
            $table->float('s_fin_discount_amount')->nullable();
            $table->float('s_fin_total_amount');
            $table->float('s_paid_amount')->nullable();
            $table->float('s_rem_amount')->nullable();
            $table->float('profit_amount');
            $table->longText('comment')->nullable();
            $table->timestamps();
            $table->unique('sbill_generated_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dsbills');
    }
}
