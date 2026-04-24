<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('where_to_buy')->nullable();
            
        });
    }


    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('where_to_buy');

        });
    }
};