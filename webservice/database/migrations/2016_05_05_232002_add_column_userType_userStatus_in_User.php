<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUserTypeUserStatusInUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->integer('fk_user_status')->length(10)->unsigned()->nullable();
            $table->integer('fk_user_types')->length(10)->unsigned()->nullable();
            $table->foreign('fk_user_status')->references('id')->on('user_status')->onDelete('set null');
            $table->foreign('fk_user_types')->references('id')->on('user_types')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users',function(Blueprint $table){
            $table->dropForeign('users_fk_user_status_foreign');
            $table->dropForeign('users_fk_user_types_foreign');
            $table->dropColumn('fk_user_status');
            $table->dropColumn('fk_user_types');

        });
    }
}
