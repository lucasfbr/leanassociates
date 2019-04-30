<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\ServicoObserver;
use App\Observers\ProfileObserver;
use App\Servico;
use App\Profile;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Servico::observe(ServicoObserver::class);
        Profile::observe(ProfileObserver::class);
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
