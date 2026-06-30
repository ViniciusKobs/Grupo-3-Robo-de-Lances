<?php

namespace App\Providers;

use App\Contracts\Repositories\TenderRepository;
use App\Models\Tender;
use app\Domain\Tender\Actions\ClaimNextTenderAction;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(TenderRepository::class, Tender::class);

        $this->app->bind(ClaimNextTenderAction::class, function ($app) {
            return new ClaimNextTenderAction(
                tenderRepository: $app->make(TenderRepository::class),
                interval: config('monitorador.tender_check_interval'),
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
