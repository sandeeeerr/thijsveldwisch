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
        Schema::table('settings', function (Blueprint $table) {
            if (!Schema::hasIndex('settings', 'settings_key_unique')) {
                $table->unique('key', 'settings_key_unique');
            }
        });
               
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
