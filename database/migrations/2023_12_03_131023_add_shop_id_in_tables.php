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
        Schema::table('tables', function (Blueprint $table) {
            Schema::table('collections', function (Blueprint $table) {
                $table->unsignedBigInteger('shop_id')->nullable();
            });
            Schema::table('products', function (Blueprint $table) {
                $table->unsignedBigInteger('shop_id')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tables', function (Blueprint $table) {
            Schema::table('collections', function (Blueprint $table) {
                $table->dropColumn('shop_id');
            });
            Schema::table('products', function (Blueprint $table) {
                $table->dropColumn('shop_id');
            });
        });
    }
};
