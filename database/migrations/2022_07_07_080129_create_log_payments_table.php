<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('from_id')->constrained('payments')->onDelete('cascade');
            $table->foreignId('to_id')->constrained('payments')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade')->nullable();
            $table->double('money');
            $table->string('content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_payments');
    }
};
