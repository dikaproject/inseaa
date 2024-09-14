<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Spatie\Analytics\Analytics;
use Spatie\Analytics\AnalyticsClientFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Analytics::class, function ($app) {
            $config = config('analytics');
            $client = AnalyticsClientFactory::createForConfig($config);

            return new Analytics($client, $config['property_id']);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading();
    }
}
