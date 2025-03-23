<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('snippet_tags', function (Blueprint $table) {
            $table->id();
            $table->integer("tag_id");
            $table->integer("snippet_id");
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('snippet_tags');
    }
};
