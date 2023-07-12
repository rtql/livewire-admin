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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->text('parent_id')->nullable();
            $table->text('type')->nullable();
            $table->text('route')->nullable();
            $table->text('origin_title')->nullable();
            $table->text('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->text('url')->nullable();
            $table->text('tag')->nullable();
            $table->text('file')->nullable();
            $table->boolean('show_in_footer')->default(1);
            $table->boolean('show_in_header')->default(1);
            $table->text('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->boolean('active')->default(1);
            $table->unsignedInteger('ordering')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('pages');
    }
};
