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
            $table->text('route')->nullable();
            $table->integer('has_pages')->default(0)->nullable();
            $table->text('parent_page')->nullable();
            $table->text('type')->nullable();
            $table->text('section')->nullable();
            $table->text('parent_id')->nullable();
            $table->text('origin_title')->nullable();
            $table->text('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->text('url')->nullable();
            $table->text('tag')->nullable();
            $table->text('file')->nullable();
            $table->boolean('has_items')->default(0);
            $table->boolean('has_media')->default(0);
            $table->boolean('documents_block')->default(0);
            $table->boolean('media_block')->default(0);
            $table->boolean('has_title')->default(1);
            $table->boolean('has_description')->default(1);
            $table->boolean('has_file')->default(1);
            $table->boolean('has_footer')->default(1);
            $table->boolean('has_header')->default(1);
            $table->text('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keywords')->nullable();
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
