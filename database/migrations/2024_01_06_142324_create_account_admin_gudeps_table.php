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
        Schema::create('account_admin_gudeps', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('id_gudep');
            $table->longText('photo_profile'); //Photo Profile User
            $table->longText('photo_full'); //Photo Profile Full User
            $table->string('nta')->unique()->nullable();
            $table->string('name');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role_id');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_admin_gudeps');
    }
};
