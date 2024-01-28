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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->text('items');
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->enum('status',['pending','processing','completed'])->default('pending');
            $table->date('delivery_date')->nullable();
            $table->text('notes')->nullable();
            $table->integer('quantity');
            $table->decimal('total_price', 10, 2);
            $table->foreignId('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
