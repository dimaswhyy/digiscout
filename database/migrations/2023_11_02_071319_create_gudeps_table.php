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
        Schema::create('gudeps', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->longText('school_logo')->nullable();
            $table->longText('gudep_logo')->nullable();
            $table->string('school_name');
            $table->string('level');
            $table->string('gudep_registration_pa')->unique();
            $table->string('gudep_registration_pi')->unique();
            $table->text('address');
            $table->string('district');
            $table->string('city');
            $table->string('province');
            $table->string('phone_number')->nullable();
            $table->string('information');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gudeps');
    }
};
