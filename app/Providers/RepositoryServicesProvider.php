<?php

namespace App\Providers;

use App\Repositories\CurriculumRepositoryInterface;
use App\Repositories\Eloquent\CurriculumRepository;
use App\Repositories\Eloquent\ExerciseRepository;
use App\Repositories\Eloquent\ExerciseSessionRepository;
use App\Repositories\Eloquent\GroupTrainingRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Eloquent\ProgramRepository;
use App\Repositories\Eloquent\RunningProgramRepository;
use App\Repositories\Eloquent\TrainingRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\ExerciseRepositoryInterface;
use App\Repositories\ExerciseSessionRepositoryInterface;
use App\Repositories\GroupTrainingRepositoryInterface;
use App\Repositories\ProgramRepositoryInterface;
use App\Repositories\RunningProgramRepositoryInterface;
use App\Repositories\TrainingRepositoryInterface;
use App\Repositories\UserRepositoryInterface;

class RepositoryServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ExerciseRepositoryInterface::class, ExerciseRepository::class);
        $this->app->bind(ExerciseSessionRepositoryInterface::class, ExerciseSessionRepository::class);
        $this->app->bind(TrainingRepositoryInterface::class, TrainingRepository::class);
        $this->app->bind(GroupTrainingRepositoryInterface::class, GroupTrainingRepository::class);
        $this->app->bind(ProgramRepositoryInterface::class, ProgramRepository::class);
        $this->app->bind(RunningProgramRepositoryInterface::class, RunningProgramRepository::class);
        $this->app->bind(CurriculumRepositoryInterface::class, CurriculumRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
