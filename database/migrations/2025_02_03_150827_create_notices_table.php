<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shopping_street_id')->constrained()->onDelete('cascade');
            $table->string('title', 255);
            $table->text('body');
            $table->timestamps();
            $table->unsignedBigInteger('prev_id')->nullable();
            $table->unsignedBigInteger('next_id')->nullable();
            // 外部キー制約
            $table->foreign('prev_id')->references('id')->on('notices')->onDelete('SET NULL');
            $table->foreign('next_id')->references('id')->on('notices')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notices');
    }
};
