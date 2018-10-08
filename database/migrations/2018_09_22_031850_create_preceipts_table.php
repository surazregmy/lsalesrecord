<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preceipts', function (Blueprint $table) {
            $table->increments('p_rec_id');
            $table->string('p_rec_no');
            $table->string('p_rec_gen_no');
            $table->integer('debtor_id');
            $table->string('p_rec_date_of_pay_n');
            $table->date('p_rec_date_of_pay');
            $table->float('p_rec_amount');
            $table->string('p_rec_entered_by');
            $table->timestamps();
            $table->unique( array('debtor_id','p_rec_gen_no') );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preceipts');
    }
}
