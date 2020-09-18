<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\GeneralSetting;
use App\Menu;
use App\OtherPage;
use App\Sociallink;

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

        view()->composer('*',function($settings){
            $settings->with('gs', Generalsetting::find(1));
            $settings->with('menus', Menu::get());
            $settings->with('footer_menus', Menu::paginate(6));
            $settings->with('footer_pages', OtherPage::where('status',1)->paginate(6));
            $settings->with('social_links', Sociallink::find(1));
            // $settings->with('cms', CmsPage::where('status',1)->get());
        });
    }
}
