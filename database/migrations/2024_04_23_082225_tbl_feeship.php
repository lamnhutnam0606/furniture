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
        Schema::create('tbl_feeship', function (Blueprint $table) {
            $table->increments('fee_id');
            $table->integer('fee_cityId');
            $table->integer('fee_districtId');
            $table->integer('fee_wardsId');
            $table->string('fee_feeship');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_feeship');
    }
};
