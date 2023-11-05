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
        Schema::create('poin_s_k_u_s', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->string('sku_number');
            $table->string('sku_theme');
            $table->text('sku_desc');
            $table->string('group_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poin_s_k_u_s');
    }
};
