<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedPostsTypesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id')->index()->comment("文章ID");
            $table->unsignedBigInteger("type_id")->index()->comment("类别ID");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
       Schema::dropIfExists('post_type');
    }
}
