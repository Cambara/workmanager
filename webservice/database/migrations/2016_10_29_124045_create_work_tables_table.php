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
            $table->integer('fk_user',false,true)->nullable();
            $table->foreign('fk_user')->references('id')->on('users')->onDelete('set null');
            $table->integer('fk_business',false,true)->nullable();
            $table->foreign('fk_business')->references('id')->on('businesses')->onDelete('set null');
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
