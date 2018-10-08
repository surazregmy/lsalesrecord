<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSreceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sreceipts', function (Blueprint $table) {
            $table->increments('s_rec_id');
            $table->string('s_rec_no');
            $table->string('s_rec_gen_no')->unique();
            $table->integer('creditor_id');
            $table->string('s_rec_date_of_pay_n');
            $table->date('s_rec_date_of_pay');
            $table->float('s_rec_amount');
            $table->string('s_rec_entered_by');
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
        Schema::dropIfExists('sreceipts');
    }
}
