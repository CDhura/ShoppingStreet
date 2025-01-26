<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;  // 追加

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('notification_id')->comment('記事ID');
            $table->string('title', 255)->charset('utf8mb4')->collation('utf8mb4_0900_ai_ci')->comment('記事タイトル');
            $table->string('body', 4095)->charset('utf8mb4')->collation('utf8mb4_0900_ai_ci')->comment('記事本文');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('作成日');
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('最終更新日');
            $table->string('last_editor_id', 255)->charset('utf8mb4')->collation('utf8mb4_0900_ai_ci')->default('default_editor')->comment('最終編集者');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
