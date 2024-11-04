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
    Schema::create('services', function (Blueprint $table) {
        $table->id();
        $table->string('name')->index();
        $table->string('seo_title', 60)->nullable()->index();
        $table->text('description');
        $table->text('seo_description')->nullable();
        $table->decimal('price', 10, 2)->nullable();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('services');
}


};
