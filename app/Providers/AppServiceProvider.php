<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
		Blade::include('installation.menu', 'installation_menu');
		Blade::include('layout.head', 'game_head');
		Blade::include('layout.header', 'game_header');
		Blade::include('layout.footer', 'game_footer');
		Blade::include('layout.menu', 'game_menu');
		Blade::include('layout.time', 'game_time');
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		if ($this->app->environment() !== 'production') {
			$this->app->register(\Way\Generators\GeneratorsServiceProvider::class);
			$this->app->register(\Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider::class);
		}
	}
}
