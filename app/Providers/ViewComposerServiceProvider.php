<?php

namespace App\Providers;

use App\Banner;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeSideAdvert();
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

    public function composeSideAdvert(){
        view()->composer('common.side-advert',function($view){
        $view->with('adverts',Banner::where('tag','=','sideAdvert')->get());
    });
    }
}
