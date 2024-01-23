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
        Schema::create('peserta_didik_gudeps', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('gudep_id');
            $table->string('admin_gudep_id')->nullable();
            $table->longText('photo_profile')->nullable(); //Photo Profile User
            $table->longText('photo_full')->nullable(); //Photo Profile Full User
            $table->string('nta')->nullable();
            $table->string('name');
            $table->string('gender');
            $table->string('address')->longtext()->nullable();
            $table->string('information')->nullable();
            $table->string('phone_number')->nullable();
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
        Schema::dropIfExists('peserta_didik_gudeps');
    }
};
