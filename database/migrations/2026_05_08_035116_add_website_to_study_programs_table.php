<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::table('study_programs', function (Blueprint $table) {

        $table->string('website')
            ->nullable()
            ->after('head_of_program');

    });
}

public function down(): void
{
    Schema::table('study_programs', function (Blueprint $table) {

        $table->dropColumn('website');

    });
}
};
