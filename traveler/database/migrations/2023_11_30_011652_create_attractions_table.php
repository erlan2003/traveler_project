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
            $table->increments('id');
            $table->string('attraction');
            $table->enum('region', ['Ош', 'Баткен', 'Чуй', 'Жалал-Абад', 'Ыссык-Кол','Нарын', 'Талас']);
            $table->enum('attractionType', ['Историческое место', 'Памятники и статуи','Природная красота','Современные архитектурные объекты','Религиозные места', 'Этнографические объекты']);
            $table->text('information');
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
