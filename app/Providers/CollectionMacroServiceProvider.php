<?php


namespace App\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class CollectionMacroServiceProvider extends ServiceProvider
{
    public function register()
    {
        Collection::make(glob(app_path() . '/Macros/CollectionMacros/*.php'))
            ->mapWithKeys(function (string $path): array {
                return [$path => pathinfo($path, PATHINFO_FILENAME)];
            })
            ->reject(function (string $macro): bool {
                return Collection::hasMacro($macro);
            })
            ->each(function (string $macro): void {
                $class = 'App\\Macros\\CollectionMacros\\' . $macro;
                Collection::macro(Str::camel($macro), app($class)());
            });
    }
}
