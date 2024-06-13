<?php

namespace Karaev\Common\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use Karaev\Common\Domain\Api\FilterConvertorServiceInterface;
use Karaev\Common\Domain\Api\SearchCriteriaInterface;
use Karaev\Common\Domain\Models\SearchCriteria;
use Karaev\Common\Domain\Service\FilterConvertorService;
use Karaev\Common\Infrastructure\Inertia\ViewModel\Frontend\Components\Menu\MainMenuViewModel;

class CommonServiceProvider extends ServiceProvider
{
    public $bindings = [
        FilterConvertorServiceInterface::class => FilterConvertorService::class,
        SearchCriteriaInterface::class => SearchCriteria::class,
    ];

    public function register()
    {
        $this->app->singleton(MainMenuViewModel::class, fn () => new MainMenuViewModel());
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'common');

        Inertia::share([
            'locale' => fn () => request()->cookie('locale') ? request()->cookie('locale') : app()->getLocale(),
            'language' => function () {
                $locale = request()->cookie('locale') ? request()->cookie('locale') : app()->getLocale();
                if (!file_exists(lang_path( $locale . '.json'))) {
                    return [];
                }
                return json_decode(file_get_contents(
                    lang_path($locale . '.json')),
                    true
                );
            },
        ]);
    }
}
