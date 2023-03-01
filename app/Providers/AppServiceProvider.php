<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerNavigationItems([
                NavigationItem::make('thecodeholic.com')
                    ->url('https://thecodeholic.com', shouldOpenInNewTab: true)
                    ->icon('heroicon-o-globe-alt')
                    ->group('Content Creator')
                    ->sort(3),
            ]);
        });
    }
}
