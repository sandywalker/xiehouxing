<?php
namespace App\Providers;

use App\Banner;
use App\Note;
use App\SeoInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
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
        $this->composerSeo();
        $this->composeSideAdvert();
        $this->composeSpaceSide();
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

    public function composerSeo()
    {
        
        view()->composer('common.seo',function($view){
                            $path  = Request::path();
                            $seos = SeoInfo::seoMap();
                            $seo;
                            if (starts_with($path,'notes')){
                                $seo =  $seos['notes'];
                            }else if (starts_with($path,'guide')){
                                $seo =  $seos['guide'];
                            }else if (starts_with($path,'activity')){
                                $seo =  $seos['activity'];
                            }else{
                                $seo = $seos['index'];
                            }

                            return $view->with('seo',$seo);

                        });


    }

    public function composeSideAdvert()
    {
        view()->composer('common.side-advert',function($view){
            $view->with('adverts',Banner::where('tag','=','sideAdvert')->get());
         });
    }

    public function composeSpaceSide()
    {
        view()->composer('common.space-side', function($view){
                // $fans =  array_slice(Auth::user()->fans(),0,5);
                // $followings = array_slice(Auth::user()->following(),0,5);
                // $view->with(compact('fans','followings'));
                return $view;
        });
    } 
}
