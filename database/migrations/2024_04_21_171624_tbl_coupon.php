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
        Schema::create('tbl_coupon', function (Blueprint $table) {
            $table->increments('coupon_id');
            $table->string('coupon_name');
            $table->string('coupon_code');
            $table->integer('coupon_qty');
            $table->integer('coupon_type');
            $table->integer('coupon_value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_coupon');
    }
};
