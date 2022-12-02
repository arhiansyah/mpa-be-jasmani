<?php

namespace App\Providers;

use App\Models\Curriculum;
use App\Models\Exercise;
use App\Models\ExerciseSession;
use App\Models\GroupTraining;
use App\Models\ProgramStudy;
use App\Models\RunningProgram;
use App\Models\Training;
use App\Observers\CurriculumObservers;
use App\Observers\ExerciseObserver;
use App\Observers\ExerciseSessionObserver;
use App\Observers\GroupTrainingObserver;
use App\Observers\ProgramObservers;
use App\Observers\RunningProgramObservers;
use App\Observers\TrainingObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        ProgramStudy::observe(ProgramObservers::class);
        Exercise::observe(ExerciseObserver::class);
        Training::observe(TrainingObserver::class);
        ExerciseSession::observe(ExerciseSessionObserver::class);
        GroupTraining::observe(GroupTrainingObserver::class);
        RunningProgram::observe(RunningProgramObservers::class);
        Curriculum::observe(CurriculumObservers::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
