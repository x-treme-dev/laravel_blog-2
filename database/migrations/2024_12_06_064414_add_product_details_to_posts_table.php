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
        Schema::table('posts', function (Blueprint $table) {
            //
            $table->text('physical_properties')->nullable(); // Физические свойства
            $table->decimal('price', 10, 2)->nullable(); // Цена
            $table->text('delivery_conditions')->nullable(); // Условия доставки
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['physical_properties', 'price', 'delivery_conditions']);
        });
    }
};
