<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExeSesHasTrainGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exe_ses_has_train_group', function (Blueprint $table) {
            $table->foreignId('session_id')->constrained('exercise_sessions')->onDelete('cascade');
            $table->foreignId('groupTraining_id')->constrained('group_trainings')->onDelete('cascade');
            $table->primary(['session_id', 'groupTraining_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exe_ses_has_train_group');
    }
}
