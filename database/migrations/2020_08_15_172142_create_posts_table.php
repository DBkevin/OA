<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title",20)->comment("会员名称");
            $table->string("custID",30)->unique()->comment("会员ID");
            $table->string("images")->comment("会员图片");
            $table->unsignedBigInteger('doctor_id')->comment("对应的医生ID");
            $table->foreign("doctor_id")->references('id')->on('doctors')->onDelete('Cascade');
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
        Schema::dropIfExists('posts');
    }
}
