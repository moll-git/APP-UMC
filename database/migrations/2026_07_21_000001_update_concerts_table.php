<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('concerts', function (Blueprint $table) {
            $table->string('status')->default('upcoming')->after('time');
            // 'upcoming' | 'in_preparation' | 'past'
            $table->string('vestuario')->nullable()->after('status');
            $table->text('notes')->nullable()->after('vestuario');
        });
    }

    public function down(): void
    {
        Schema::table('concerts', function (Blueprint $table) {
            $table->dropColumn(['status', 'vestuario', 'notes']);
        });
    }
};
