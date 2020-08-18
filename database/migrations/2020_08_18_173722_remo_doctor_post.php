<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoDoctorPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
           $table->dropForeign('posts_doctor_id_foreign');
           $table->dropColumn('doctor_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('doctor_id')->comment("对应的医生ID");
            $table->foreign("doctor_id")->references('id')->on('doctors')->onDelete('Cascade');
        });
    }
}
