<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_table', function (Blueprint $table) {
            $table->increments('id');
            $table->string('eventdescription');
            $table->string('table1')->nullable();
            $table->string('column1')->nullable();
            $table->string('row_id')->nullable() ;//name of item/ original bill no
            $table->string('oldvalue')->nullable();
            $table->string('newvalue')->nullable();
            $table->string('action1');
            $table->string('user1')->nullable();;      
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_table');
    }
}
