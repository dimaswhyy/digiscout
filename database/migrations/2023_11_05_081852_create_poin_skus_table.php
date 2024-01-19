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
        Schema::create('poin_skus', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->string('sku_number');
            $table->string('sku_theme');
            $table->longText('sku_desc');
            $table->string('group_id');
	        $table->string('level_group_id');
	        $table->integer('skor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poin_skus');
    }
};
