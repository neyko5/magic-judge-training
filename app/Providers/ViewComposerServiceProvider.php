<?php

namespace MagicJudgeTraining\Providers;

use Illuminate\Support\ServiceProvider;
use MagicJudgeTraining\Page;
use MagicJudgeTraining\Lesson;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.nav', function($view)
        {
            $view->with('pages', Page::where("title", "<>", "Index")->where('published', '1')->orderBy("order")->get());
            $view->with('lessons', Lesson::where('published', '1')->orderBy("order")->get());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
