<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodToEatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_to_eat', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('complete_date');
            $table->timestamps();
        });
    }
    protected $casts = [
        'created_at' => 'datetime:Y-m-d', // Change your format
        'updated_at' => 'datetime:Y-m-d',
        'complete_date' => 'datetime:Y-m-d',
    ];
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_to_eat');
    }
}
