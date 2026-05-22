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
        Schema::table('site_settings', function (Blueprint $table) {

    $table->string('primary_color')->nullable();
    $table->string('primary_light')->nullable();
    $table->string('primary_dark')->nullable();

    $table->string('gold_color')->nullable();
    $table->string('gold_light')->nullable();
    $table->string('gold_dark')->nullable();

    $table->string('secondary_color')->nullable();
    $table->string('accent_color')->nullable();
    $table->string('accent2_color')->nullable();

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            //
        });
    }
};
