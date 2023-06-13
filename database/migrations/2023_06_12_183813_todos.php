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
        Schema::create('todos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->nullable()->unsigned();
            $table->foreign('parent_id')->references('id')->on('todos')->onDelete('cascade');
            $table->integer('user_id');
            $table->index(['user_id']);
            $table->enum('status', ['todo', 'done'])->default('todo');
            $table->index(['status']);
            $table->smallInteger('priority')->default(1);
            $table->index(['priority']);
            $table->string('title');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('todos');
    }
};
