<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('faculty_profiles', function (Blueprint $table) {

            $table->string('dean_name')->nullable();
            $table->text('dean_message')->nullable();
            $table->string('dean_photo')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('faculty_profiles', function (Blueprint $table) {

            $table->dropColumn([
                'dean_name',
                'dean_message',
                'dean_photo'
            ]);

        });
    }
};