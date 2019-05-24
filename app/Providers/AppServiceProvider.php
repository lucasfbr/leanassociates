<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\ServicoObserver;
use App\Observers\ProfileObserver;
use App\Observers\HeaderObserver;
use App\ContentServico;
use App\Profile;
use App\Header;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        ContentServico::observe(ServicoObserver::class);
        Profile::observe(ProfileObserver::class);
        Header::observe(HeaderObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
