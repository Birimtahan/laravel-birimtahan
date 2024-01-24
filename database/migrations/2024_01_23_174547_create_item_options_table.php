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
        Schema::create('item_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('file')->nullable();
            $table->string('section')->nullable();
            $table->integer('relative_order')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('item_id')
                ->references('id')
                ->on('exam_items')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');

            $table->index('relative_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_options');
    }
};
