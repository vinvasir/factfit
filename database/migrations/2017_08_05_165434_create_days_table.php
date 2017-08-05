<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->unsignedInteger('user_id')->index();
            $table->boolean('editable')->default(0);
            $table->integer('good_food_count')->default(0);
            $table->integer('bad_food_count')->default(0);
            $table->integer('exercise_minutes_count')->default(0);
            $table->integer('good_health_events_count')->default(0);
            $table->integer('bad_health_events_count')->default(0);
            $table->float('food_goal_progress')->index()->default(0);
            $table->float('exercise_goal_progress')->index()->default(0);
            $table->float('good_health_progress')->index()->default(0);
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
        Schema::dropIfExists('days');
    }
}
