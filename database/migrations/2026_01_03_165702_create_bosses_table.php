<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bosses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title')->nullable(); // bijv. "Starscourge Radahn"
            $table->text('description');
            $table->string('location')->nullable();
            $table->string('image')->nullable();
            $table->integer('difficulty')->default(1); // 1-5 sterren
            $table->string('drops')->nullable(); // wat ze droppen
            $table->integer('health')->nullable();
            $table->integer('order')->default(0); // volgorde op pagina
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bosses');
    }
};
