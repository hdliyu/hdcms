<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeChatNewsTable extends Migration
{
    public function up()
    {
        Schema::create('wechat_news', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('module_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('rule_id')->constrained('wechat_rules')->onDelete('cascade');
            $table->json('contents')->comment('回复内容');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('we_chat_news');
    }
}
