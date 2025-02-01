<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Standard category name (e.g., "Technology")
            $table->json('mappings')->nullable(); // Store source-specific category names
        });

    }

    public function down()
    {
        Schema::dropIfExists('article_category');
        Schema::dropIfExists('categories');
    }
};