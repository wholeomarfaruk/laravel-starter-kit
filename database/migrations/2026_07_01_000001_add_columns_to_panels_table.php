<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('panels', function (Blueprint $table) {
            $table->string('description')->nullable()->after('slug');
            $table->string('route_name')->nullable()->after('description');
            $table->string('permission_key')->nullable()->after('route_name');
            $table->boolean('is_active')->default(true)->after('permission_key');
            $table->integer('sort_order')->default(0)->after('is_active');
        });
    }

    public function down(): void
    {
        Schema::table('panels', function (Blueprint $table) {
            $table->dropColumn(['description', 'route_name', 'permission_key', 'is_active', 'sort_order']);
        });
    }
};
