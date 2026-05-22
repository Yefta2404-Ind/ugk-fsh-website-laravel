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
Schema::create('theme_settings', function (Blueprint $table) {
    $table->id();

    $table->string('primary')->default('#0B4650');
    $table->string('primary_light')->default('#155e6e');
    $table->string('primary_dark')->default('#072e38');

    $table->string('gold')->default('#E6FF2B');
    $table->string('gold_light')->default('#eeff55');
    $table->string('gold_dark')->default('#c4db00');

    $table->string('secondary')->default('#F9F7F2');
    $table->string('accent')->default('#fdfcf9');
    $table->string('accent2')->default('#f0ede5');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theme_settings');
    }
};
