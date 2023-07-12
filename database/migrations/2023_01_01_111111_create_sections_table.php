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
        Schema::create('sections', function (Blueprint $table) {
            // base
            $table->id();
            $table->text('route')->nullable();
            $table->text('origin_title')->nullable();
            $table->text('description')->nullable();
            $table->text('link')->nullable();
            $table->text('title')->nullable();
            $table->text('tag')->nullable();
            $table->text('file')->nullable();
            $table->boolean('has_items')->default(0);
            $table->boolean('has_media')->default(0);
            $table->boolean('active')->default(1);
            $table->unsignedInteger('ordering')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
