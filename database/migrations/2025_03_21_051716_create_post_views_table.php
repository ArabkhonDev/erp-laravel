<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('post_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('viewer_id');
            $table->enum('viewer_type', ['teacher', 'student']); 
            $table->date('viewed_at'); // Ko‘rilgan kun
            $table->integer('view_count')->default(1); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('post_views');
    }
};
