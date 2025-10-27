<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedTinyInteger('roleId')->default(4)->after('remember_token')->nullable(false);
        });

        // Update existing users (if any) to have roleId = 1
        DB::table('users')->update(['roleId' => 1]);

        Schema::table('users', function (Blueprint $table) {
            // make password nullable
            $table->string('password')->nullable(true)->change();
            // foreign key relationship
            $table->foreign('roleId')
                  ->references('roleId')->on('roles')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['roleId']);
            $table->dropColumn('roleId');
        });
    }
};
