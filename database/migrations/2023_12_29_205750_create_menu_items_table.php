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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\MenuGroup::class)->constrained()->cascadeOnDelete();
            $table->nullableMorphs('linkable');
            $table->string('title');
            $table->text('link')->nullable();
            $table->unsignedBigInteger('order')->nullable();
            $table->boolean('new_tab')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
