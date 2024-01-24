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
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('section_id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('file')->nullable();
            $table->string('sector')->nullable();
            $table->integer('relative_order')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('section_id')
                ->references('id')
                ->on('sections')
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
        Schema::dropIfExists('options');
    }
};
