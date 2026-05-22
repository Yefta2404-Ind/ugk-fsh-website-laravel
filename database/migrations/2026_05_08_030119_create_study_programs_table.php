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
    Schema::create('study_programs', function (Blueprint $table) {
        $table->id();

        $table->string('name');
        $table->string('slug')->unique();

        $table->string('short_name')->nullable();

        $table->text('description')->nullable();

        $table->string('logo')->nullable();

        $table->string('accreditation')->nullable();

        $table->string('head_of_program')->nullable();

        $table->integer('students_count')->default(0);

        $table->boolean('is_active')->default(true);

        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_programs');
    }
};
