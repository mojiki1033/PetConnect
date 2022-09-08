<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('status_id')->constrained();
            $table->string('title', 50);
            $table->foreignId('sex_id')->constrained();
            $table->integer('age');
            $table->foreignId('species_id')->constrained();
            $table->string('breed', 50);
            $table->foreignId('prefecture_id')->constrained();
            $table->string('delivery_area', 50);
            $table->string('body', 2000)->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
}
