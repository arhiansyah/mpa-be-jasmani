<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingHasGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_has_group', function (Blueprint $table) {
            $table->foreignId('training_id')->constrained('trainings')->onDelete('cascade');
            $table->foreignId('groupTraining_id')->constrained('group_trainings')->onDelete('cascade');
            $table->primary(['training_id', 'groupTraining_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training_has_group');
    }
}
