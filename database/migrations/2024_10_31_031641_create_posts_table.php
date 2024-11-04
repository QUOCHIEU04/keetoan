<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('title')->index();
        $table->string('seo_title', 60)->nullable()->index();
        $table->text('content');
        $table->text('seo_description')->nullable();
        $table->string('image')->nullable();
        $table->boolean('is_published')->default(false);
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('posts');
}

};
