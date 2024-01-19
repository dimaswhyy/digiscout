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
        Schema::create('pengurus_gudeps', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('gudep_id');
            $table->string('admin_gudep_id');
            $table->longText('photo_profile')->nullable(); //Photo Profile User
            $table->longText('photo_full')->nullable(); //Photo Profile Full User
            $table->string('nta')->unique()->nullable();
            $table->string('name');
            $table->string('gender');
            $table->string('address')->longtext();
            $table->string('phone_number');
            $table->string('position_id');
            $table->string('information');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengurus_gudeps');
    }
};
