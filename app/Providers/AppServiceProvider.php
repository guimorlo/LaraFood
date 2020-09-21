<?php

namespace App\Providers;

use App\Models\Plan;
use App\Observers\PlanObserver;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

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
    public function boot(Dispatcher $events)
    {
        Plan::observe(PlanObserver::class);
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $event->menu->addBefore('userHeader', [
                'key' => 'plans',
                'text' => 'Planos',
                'url'  => 'admin/plans',
                'icon'        => 'far fa-fw fas fa-archive',
                'label'       => Plan::count(),
                'label_color' => 'success',
            ]);
        });
    }
}
