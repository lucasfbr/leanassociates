<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\ServicoObserver;
use App\Servico;

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
