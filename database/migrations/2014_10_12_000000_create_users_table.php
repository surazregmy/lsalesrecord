<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('name')->unique();
            $table->string('role')->default('user');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

        });

        DB::unprepared('INSERT INTO users VALUES(1,"admin@salesrecord.com","Admin","admin",
        "$2y$10$QikDtrqFNNQ.aqSu31xIae3qyzKi9Pof1oP06yjyzzPKzkbApRRkC",NULL,curdate(),curdate())');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
