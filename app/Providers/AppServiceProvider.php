<?php

namespace App\Providers;

use App\Logic\Contracts\Competencies;
use App\Logic\Contracts\QuestionBank;
use App\Logic\Contracts\Questions;
use App\Logic\Contracts\Surveys;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $this->app->bind('question_bank', QuestionBank::class);
        $this->app->bind('competency_bank', Competencies::class);
        $this->app->bind('question', Questions::class);
        $this->app->bind('survey', Surveys::class);
    }
}
