<?php

namespace App\Providers;

use App\Models\ContactDetail;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        require_once app_path('Helpers/BannerHelper.php');

        $webConfigEmail = ContactDetail::latest()->value('email');
        $webConfigMobileNo = ContactDetail::latest()->value('phone_nos');
        $webConfigAddresses = ContactDetail::latest()->value('addresses');
        // dd($webConfigEmail,$webConfigMobileNo,$webConfigAddresses[0]);

        View::share([
            'webConfigEmail' => $webConfigEmail,
            'webConfigMobileNos'   => $webConfigMobileNo,
            'webConfigAddresses'    => $webConfigAddresses,
        ]);

    }
}
