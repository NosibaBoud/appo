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
        Schema::create('user_investigations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('investigation_id');
            
            $table->enum('status', [
                'Confirmed',
                'Pending',
                'Cancelled'
            ])->default('Pending');

            $table->foreignId('lab_technician_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_investigations');
    }
};