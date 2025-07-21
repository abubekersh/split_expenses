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
        Schema::create('settlements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('group_id');
            $table->foreignId('from_user_id')->references('id')->on('users');
            $table->foreignId('to_user_id')->references('id')->on('users');
            $table->decimal('amount');
            $table->enum('status', ['pending', 'setteled'])->default('pending');
            $table->timestamps();
            $table->unique(['group_id', 'from_user_id', 'to_user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settlements');
    }
};
