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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('tours_type');
            $table->foreign('tours_type')->references('id')->on('tours_types')->onDelete('cascade');

            $table->unsignedBigInteger('difficulty');
            $table->foreign('difficulty')->references('id')->on('difficulties')->onDelete('cascade');

            $table->integer(price)->unsigned();


            $table->unsignedBigInteger('attraction_list');
            $table->foreign('attraction_list')->references('id')->on('attraction_lists')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
