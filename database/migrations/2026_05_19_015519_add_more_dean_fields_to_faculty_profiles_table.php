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
        Schema::table('faculty_profiles', function (Blueprint $table) {

    $table->string('dean_role')->nullable();
    $table->string('dean_period')->nullable();
    $table->string('dean_title')->nullable();
    $table->string('dean_button_link')->nullable();

    $table->string('dean_pillar_1')->nullable();
    $table->string('dean_pillar_2')->nullable();
    $table->string('dean_pillar_3')->nullable();

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('faculty_profiles', function (Blueprint $table) {
            //
        });
    }
};
