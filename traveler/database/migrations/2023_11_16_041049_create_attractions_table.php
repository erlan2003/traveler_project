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
        Schema::create('attractions', function (Blueprint $table) {
            $table->id();
            $table->string('attraction');
            $table->string('information');

            $table->unsignedBigInteger('attraction_list_id');
            $table->foreign('attraction_list_id')->references('id')->on('attraction_list')->onDelete('cascade');

            $table->unsignedBigInteger('region');
            $table->foreign('region')->references('id')->on('regions')->onDelete('cascade');

            $table->unsignedBigInteger('attraction_type');
            $table->foreign('attraction_type')->references('id')->on('attraction_types')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attractions');
    }
};
