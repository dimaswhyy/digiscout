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
        Schema::create('pemberitahuan_gudeps', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('gudep_id');
            $table->string('admin_gudep_id');
            $table->string('penguji_gudep_id');
            $table->string('title');
            $table->longText('desc');
            $table->date('date');
            $table->time('time');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemberitahuan_gudeps');
    }
};
