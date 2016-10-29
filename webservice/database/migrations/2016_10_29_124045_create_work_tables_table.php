<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_tables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fk_user',false,true);
            $table->foreign('fk_user')->references('id')->on('users');
            $table->integer('fk_business',false,true);
            $table->foreign('fk_business')->references('id')->on('businesses');
            $table->text('description');
            $table->date('day');
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
        Schema::drop('work_tables');
    }
}
