<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrisonersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prisoners', function (Blueprint $table) {
            $table->id();
            $table->string('prisoner_name');
            $table->bigInteger('nid');
            $table->string('crime');
            $table->string('crime_details')->nullable();
            $table->string('address');
            $table->string('punishment');
            $table->date('date_in');
            $table->date('date_out');
            $table->integer('age');
            $table->string('gender');
            $table->integer('case_id')->nullable();
            $table->integer('cell_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prisoners');
    }
}
