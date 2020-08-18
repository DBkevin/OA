<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveEmailToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropUnique('users_email_unique');
            $table->string('email')->nullable()->comment('允许email为空')->change();
            $table->string('phone')->unique()->after("name")->comment("电话号码，用于登陆");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string("email")->change();
            $table->unique("users_email_unique");
            $table->dropColumn('phone');
        });
    }
}
