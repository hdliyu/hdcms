<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWechatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wechats', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('公众号名称');
            $table->string('introduce')->nullable()->comment('公众号介绍');
            $table->string('name')->nullable()->comment('微信号');
            $table->string('qr')->nullable()->comment('二维码');
            $table->string('token')->comment('token');
            $table->string('type')->comment('类型');
            $table->string('wechat_id')->nullable()->unique()->comment('原始ID');
            $table->string('appID')->unique();
            $table->string('appsecret');
            $table->string('welcome')->nullable()->comment('订阅时欢迎消息');
            $table->string('default_message')->nullable()->comment('默认回复消息');
            $table->json('menus')->nullable()->comment('微信菜单');
            $table->foreignId('site_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('wechats');
    }
}
