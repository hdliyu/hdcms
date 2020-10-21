<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeChatUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wechat_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_id')->constrained()->onDelete('cascade');
            $table->foreignId('wechat_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('type')->nullable()->comment('来源:web/wechat');
            $table->string('openid')->nullable()->comment('微信openid');
            $table->string('unionid')->nullable()->comment('微信openid');
            $table->boolean('subscribe')->default(0);
            $table->string('nickname')->nullable();
            $table->tinyInteger('sex')->default(0);
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('province')->nullable();
            $table->string('language')->nullable();
            $table->string('headimgurl')->nullable();
            $table->timestamp('subscribe_time')->nullable();
            $table->string('remark')->nullable();
            $table->string('groupid')->nullable();
            $table->json('tagid_list')->nullable();
            $table->string('subscribe_scene')->nullable();
            $table->string('qr_scene')->nullable();
            $table->string('qr_scene_str')->nullable();
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
        Schema::dropIfExists('we_chat_users');
    }
}
