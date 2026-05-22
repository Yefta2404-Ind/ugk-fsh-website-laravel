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
        Schema::create('quick_accesses', function (Blueprint $table) {
    $table->id();

    $table->string('title');
    $table->string('url');

    $table->string('icon')->nullable();

    $table->string('bg_color')->nullable();
    $table->string('text_color')->nullable();

    $table->boolean('new_tab')->default(false);
    $table->boolean('is_active')->default(true);

    $table->integer('order')->default(0);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quick_accesses');
    }
};
