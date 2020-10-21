<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeChatMaterialsTable extends Migration
{
    public function up()
    {
        Schema::create('wechat_materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('module_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('wechat_id')->constrained()->onDelete('cascade');
            $table->char('type', 30)->comment('素材内容');
            $table->json('info')->comment('微信服务器的素材数据');
            $table->json('content')->comment('网站服务器素材的原始内容');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('we_chat_materials');
    }
}
