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
      View::composer(['_includes.nav.mainNav','welcome'], 'App\Http\Composers\ViewComposerCity');
      View::composer(['_includes.nav.mainNav','pages.userPages.home','layouts.partials.headTitle'], 'App\Http\Composers\ViewComposerAuthUserData');
      View::composer(['pages.userPages.profile',
                      'pages.userPages.reviews',
                      'pages.userPages.photos',
                      'pages.userPages.partials.pageNav',
                      'pages.userPages.partials.pageHeader',
                      'pages.userPages.partials.basicUserInfo',
                      'pages.userPages.partials.pageBasicUserInfo'
                    ], 'App\Http\Composers\ViewComposerUserData');
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
