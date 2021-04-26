<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\LanguageService;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       View::share('network', config('settings.network'));

        foreach (glob(app_path() . '/Helpers/*.php') as $filename) {
            require_once($filename);
        }

        if (file_exists(storage_path('installed'))) {
            $langs = LanguageService::all();

            $languages = [];

            foreach ($langs as $lang) {
                $languages[$lang] = [
                    'name' => $lang,
                    'script' => ucfirst($lang),
                    'native' => $lang,
                ];
            }

            config([
                'laravellocalization.supportedLocales' => $languages,
                'laravellocalization.useAcceptLanguageHeader' => false,
                'laravellocalization.hideDefaultLocaleInURL' => true,
            ]);
        } 
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);

        \Blade::if ('adv', function ($blockNumber = null) {
            if (\Route::currentRouteName() === 'admin.index') {
                return false;
            }

            return !empty(config('settings.adsense.client_id'))
                && (
                $blockNumber === null
                    ? !empty(config('settings.adsense.block1_id')) || !empty(config('settings.adsense.block2_id'))
                    : !empty(config('settings.adsense.block' . $blockNumber . '_id'))
                );
        });

        if (file_exists(storage_path('installed'))) {
            $settings = \Schema::hasTable('settings') ? Setting::query()->first() : null;

            if ($settings !== null) {
                config([
                    'settings.main.show_transactions' => $settings->show_transactions,
                    'settings.logo' => $settings->logo,
                    'settings.adsense.client_id' => $settings->client_id,
                    'settings.adsense.block1_id' => $settings->block1_id,
                    'settings.adsense.block2_id' => $settings->block2_id,
                    'settings.cache.address' => $settings->cache_address,
                    'settings.cache.block' => $settings->cache_block,
                    'settings.cache.transaction' => $settings->cache_transaction,
                    'settings.language' => $settings->language,
                    'settings.color_scheme' => $settings->color_scheme,
                ]);

                config([
                    'app.locale' => strtolower($settings->language),
                ]);
            }
        }
    }
}
