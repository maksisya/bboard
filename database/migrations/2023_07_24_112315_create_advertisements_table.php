<?php

use App\Models\Ad_type;
use App\Models\Category;
use App\Models\User;
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
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(table: 'users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('category_id')->constrained(table: 'categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('ad_type_id')->constrained(table: 'ad_types')->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->text('content');
            $table->string('image_path')->nullable();
            $table->integer('price')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertisements');
    }
};
