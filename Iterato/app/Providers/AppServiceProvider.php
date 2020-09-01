<?php

namespace App\Providers;

use App\Services\WeatherService;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use App\Contracts\WeatherServiceContract;

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
    public function boot(): void
    {
        $this->app->singleton(WeatherService::class, static function ($app) {
            return new WeatherService(
              config('openweather.endpoint'),
              config('openweather.unit'),
              new Client()
            );
        });

        $this->app->bind(
          WeatherServiceContract::class,
          WeatherService::class
        );
    }
}
