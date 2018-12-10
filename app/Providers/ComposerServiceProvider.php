<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      View::composer(['_includes.nav.mainNav' ,'welcome'], 'App\Http\Composers\ViewComposerCity');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
