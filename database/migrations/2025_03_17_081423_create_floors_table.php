<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('floors', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Masalan: "1-qavat"
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('floors');
    }
};
