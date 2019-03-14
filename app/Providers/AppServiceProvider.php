<?php

namespace App\Providers;

use App\Message;
use App\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Way\Generators\GeneratorsServiceProvider;
use Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        date_default_timezone_set(config('server.timezone', 'Europe/Rome'));

        Blade::include('index.footer', 'index_footer');
        Blade::include('index.head', 'index_head');
        Blade::include('manual.footer', 'manual_footer');
        Blade::include('layout.head', 'game_head');
        Blade::include('layout.header', 'game_header');
        Blade::include('layout.footer', 'game_footer');
        Blade::include('layout.menu', 'game_menu');

        if (config('server.newsboxes.1')) {
            View::share('peace_type', [
                trans('installation/config.server_options.peace_type.none'),
                trans('installation/config.server_options.peace_type.normal'),
                trans('installation/config.server_options.peace_type.christmas'),
                trans('installation/config.server_options.peace_type.new_year'),
                trans('installation/config.server_options.peace_type.easter'),
                trans('installation/config.server_options.peace_type.maintenance')
            ]);
        }

        if (Auth::check()) { //Reports and messages not read
            $unviewedReport = Auth::user()->reports()->where('viewed', 0)->exists();
            $unviewedMessage = Auth::user()->messages()->where('viewed', 0)->exists();

            $reportMessageClassName = $unviewedMessage ? ($unviewedReport ? 'i1' : 'i2') : ($unviewedReport ? 'i3' : 'i4');

            View::share(compact('reportMessageClassName'));
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(GeneratorsServiceProvider::class);
            $this->app->register(MigrationsGeneratorServiceProvider::class);
        }
    }
}
