<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersPosts extends Migration
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
            $table->foreignId('user_id')->after('id')->constrained()->onDelete('cascade');
            $table->text("images","ZXimages")->change();
            $table->text("WCimages")->after("images")->comment("无创图片");
            $table->text("PFimages")->after("WCimages")->comment("皮肤图片");
            $table->text('KQimages')->alter("PFimages")->comment("口腔图片");
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
            $table->dropForeign('posts_user_id_foreign');
            $table->dropColumn('user_id');
            $table->dropColumn('WCimages');
            $table->dropColumn("PFimages");
            $table->dropColumn("KQimages");
        });
    }
}
