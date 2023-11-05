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
        Schema::create('golongan_gudeps', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->string('golongan_id');
            $table->string('information');
            $table->string('gudep_id');
            $table->string('admin_gudep_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('golongan_gudeps');
    }
};
