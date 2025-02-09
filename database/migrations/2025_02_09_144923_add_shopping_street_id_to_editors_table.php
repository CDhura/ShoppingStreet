<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('editors', function (Blueprint $table) {
            $table->foreignId('shopping_street_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('editors', function (Blueprint $table) {
            $table->dropForeign(['shopping_street_id']);
            $table->dropColumn('shopping_street_id');
        });
    }
};