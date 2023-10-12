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
        Schema::create('product', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("product_code");
            $table->string("product_name");
            $table->float("product_price");
            $table->timestamps();//ini ada supaya ada data created data dan updated_date
            $table->softDeletes(); // ini berfungsi ketika ada fungsi delete 
            //sebetulnya data tidak dihapus di database tapi ada field status deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
