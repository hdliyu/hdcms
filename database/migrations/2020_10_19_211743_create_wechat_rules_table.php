<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeChatRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wechat_rules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_id')->constrained()->onDelete('cascade');
            $table->foreignId('module_id')->constrained()->onDelete('cascade');
            $table->foreignId('wechat_id')->constrained('wechats')->onDelete('cascade');
            $table->string('module')->nullable()->comment('模块');
            $table->string('type')->nullable()->comment('类型');
            $table->string('title')->comment('规则名称');
            $table->json('options')->nullable()->comment('模块的规则选项');
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
        Schema::dropIfExists('we_chat_rules');
    }
}
