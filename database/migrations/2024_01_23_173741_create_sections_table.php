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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exam_id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('file')->nullable();
            $table->string('type');
            $table->json('correct_options')->nullable();
            $table->integer('relative_order')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('exam_id')
                ->references('id')
                ->on('exams')
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
        Schema::dropIfExists('sections');
    }
};
