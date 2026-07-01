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
        Schema::table('countries', function (Blueprint $table) {
            $table->string('emoji_flag', 10)->nullable()->after('phone_code');
            $table->boolean('is_register_allowed')->default(false)->after('emoji_flag');
            $table->boolean('is_active')->default(true)->after('is_register_allowed');
            $table->unsignedSmallInteger('sort_order')->default(0)->after('is_active');
        });
    }

    public function down(): void
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->dropColumn(['emoji_flag', 'is_register_allowed', 'is_active', 'sort_order']);
        });
    }
};
