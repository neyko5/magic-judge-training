<?php

namespace MagicJudgeTraining\Providers;

use Illuminate\Support\ServiceProvider;
use MagicJudgeTraining\Page;

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
            $view->with('pages', Page::where("title", "<>", "Index")->orderBy("order")->get());
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
