<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeChatKeywordsTable extends Migration
{
    public function up()
    {
        Schema::create('wechat_keywords', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('module_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('wechat_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('rule_id')->constrained('wechat_rules')->onDelete('cascade');
            $table->string('word')->comment('微信关键词');
            $table->boolean('regexp')->default(false)->comment('正则关键词');
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
        Schema::dropIfExists('we_chat_keywords');
    }
}
