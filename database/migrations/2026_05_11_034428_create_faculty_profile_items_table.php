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
        Schema::create('faculty_profile_items', function (Blueprint $table) {
    $table->id();

    $table->foreignId('faculty_profile_id')
        ->constrained()
        ->onDelete('cascade');

    // misi / tujuan
    $table->enum('type', ['misi', 'tujuan']);

    $table->text('content');

    $table->integer('sort_order')->default(0);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculty_profile_items');
    }
};
