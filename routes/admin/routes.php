<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\AboutbannerController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\AboutusController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\BusinessSetting\ContactUsSubmission;
use App\Http\Controllers\Admin\ContactDetailController;
use App\Http\Controllers\Admin\PageBannerController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\BusinessSetting\SettingController;
use App\Http\Controllers\Admin\BusinessSetting\GlobalPresenceController;
use App\Http\Controllers\Admin\BusinessSetting\ExhibitionController;




Route::prefix('admin')->group(function () {

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/admin/profile', [AdminController::class, 'edit'])->name('admin.profile');
        Route::put('/admin/profile/update', [AdminController::class, 'update'])->name('profile.update');
        // home page banner route

        Route::get('/banner', [BannerController::class, 'index'])->name('banner.index');
        Route::get('/banner/create', [BannerController::class, 'create'])->name('banner.create');
        Route::post('/banner', [BannerController::class, 'store'])->name('banner.store');
        Route::get('/banner/{id}/edit', [BannerController::class, 'edit'])->name('banner.edit');
        Route::put('/banner/{id}', [BannerController::class, 'update'])->name('banner.update');
        Route::delete('/banner/{id}', [BannerController::class, 'destroy'])->name('banner.destroy');

        Route::get('/slider', [SliderController::class, 'index'])->name('banners.index');
        Route::get('/slider/create', [SliderController::class, 'create'])->name('banners.create');
        Route::post('/slider/store', [SliderController::class, 'store'])->name('banners.store');
        Route::get('/slider/edit/{banner}', [SliderController::class, 'edit'])->name('banners.edit');
        Route::post('/slider/update/{banner}', [SliderController::class, 'update'])->name('banners.update');
        Route::delete('/slider/delete/{banner}', [SliderController::class, 'destroy'])->name('banners.destroy');

	 Route::controller(ContactUsSubmission::class)->group(function(){
        Route::get('contact-list', 'contactList')->name('contact-list');
        Route::delete('/contacts/{id}', 'destroy')->name('contacts.destroy');
        Route::get('contact-info/edit', 'edit')->name('contact-info.edit');
        Route::put('contact-info/update', 'update')->name('contact-info.update');
        Route::get('replies/{id}', 'replyView')->name('replyView');
        Route::post('reply/{id}', 'reply')->name('reply');
        Route::post('contacts/{id}/reply', 'reply_user')->name('contacts.reply');

    });



        // blogs section
        Route::get('/blogs', [BlogsController::class, 'list'])->name('blogs');
        Route::get('/blogs/create', [BlogsController::class, 'create'])->name('create');
        Route::post('/blogs', [BlogsController::class, 'store'])->name('store');
        Route::get('/blogs/{id}/edit', [BlogsController::class, 'edit'])->name('edit');
        Route::put('/blogs/{id}', [BlogsController::class, 'update'])->name('update');
        Route::delete('/blogs/{id}', [BlogsController::class, 'destroy'])->name('destroy');

        // aboutus
        Route::get('/aboutus', [AboutusController::class, 'list'])->name('aboutus');
        Route::get('/aboutus/create', [AboutusController::class, 'create'])->name('aboutus.create');
        Route::post('/aboutus', [AboutusController::class, 'store'])->name('aboutus.store');
        Route::get('/aboutus/{id}/edit', [AboutusController::class, 'edit'])->name('aboutus.edit');
        Route::put('/aboutus/{id}', [AboutusController::class, 'update'])->name('aboutus.update');
        Route::delete('/aboutus/{id}', [AboutusController::class, 'destroy'])->name('aboutus.destroy');

        Route::get('/portfolio', [PortfolioController::class, 'list'])->name('admin.portfolio');
        Route::get('/portfolio/create', [PortfolioController::class, 'create'])->name('portfolio.create');
        Route::post('/portfolio', [PortfolioController::class, 'store'])->name('portfolio.store');
        Route::get('/portfolio/{id}/edit', [PortfolioController::class, 'edit'])->name('portfolio.edit');
        Route::put('/portfolio/{id}', [PortfolioController::class, 'update'])->name('portfolio.update');
        Route::delete('/portfolio/{id}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');
        Route::resource('contact_details', ContactDetailController::class);
        // brand
        Route::get('/brand', [BrandController::class, 'list'])->name('brand');
        Route::get('/brand/create', [BrandController::class, 'create'])->name('brand.create');
        Route::post('/brand', [BrandController::class, 'store'])->name('brand.store');
        Route::get('/brand/{id}/edit', [BrandController::class, 'edit'])->name('brand.edit');
        Route::put('/brand/{id}', [BrandController::class, 'update'])->name('brand.update');
        Route::delete('/brand/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');

        Route::get('/services', [ServicesController::class, 'list'])->name('services');
        Route::get('/services/create', [ServicesController::class, 'create'])->name('services.create');
        Route::post('/services', [ServicesController::class, 'store'])->name('services.store');
        Route::get('/services/{id}/edit', [ServicesController::class, 'edit'])->name('services.edit');
        Route::put('/services/{id}', [ServicesController::class, 'update'])->name('services.update');
        Route::delete('/services/{id}', [ServicesController::class, 'destroy'])->name('services.destroy');

        Route::get('/project', [ProjectController::class, 'list'])->name('project');
        Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');
        Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
        Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
        Route::put('/project/{id}', [ProjectController::class, 'update'])->name('project.update');
        Route::delete('/project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');


        Route::get('/page_banners', [PageBannerController::class, 'index'])->name('page_banner.index');
        Route::get('/page_banners/{id}/edit', [PageBannerController::class, 'edit'])->name('page_banner.edit');
        Route::put('/page_banners/{id}', [PageBannerController::class, 'update'])->name('page_banner.update');

        // home pages abouts banners
        Route::get('/aboutsbanner', [AboutbannerController::class, 'list'])->name('abouts.banner');
        // Route::get('/banner/create', [AboutbannerController::class, 'create'])->name('banner.create');
        // Route::post('/banner', [AboutbannerController::class, 'store'])->name('banner.store');
        Route::get('/aboutbanner/{id}/edit', [AboutbannerController::class, 'edit'])->name('aboutbanner.edit');
        Route::put('/aboutbanner/{id}', [AboutbannerController::class, 'update'])->name('aboutbanner.update');
        Route::delete('/banner/{id}', [AboutbannerController::class, 'destroy'])->name('banner.destroy');


        Route::get('/students', [StudentController::class, 'index'])->name('admin.students');
        Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');

        Route::prefix('website-setting/')->name('website-setting.')->controller(SettingController::class)->group(function(){
            Route::get('cache-clear', 'cacheClear')->name('cache-clear');
        });

        Route::controller(GlobalPresenceController::class)->group(function(){
            Route::get('global-presence', 'index')->name('admin.global-presence');
            Route::get('global-presence-add', 'add')->name('admin.global-presence.add');
            Route::post('global-presence-store', 'store')->name('admin.global-presence.store');
            Route::get('global-presence-edit/{id}', 'edit')->name('admin.global-presence.edit');
            Route::post('global-presence-update/{id}', 'update')->name('admin.global-presence.update');
            Route::get('global-presence-delete/{id}', 'delete')->name('admin.global-presence.delete');

        });
    });

    Route::post('exhibitions-status-change', [ExhibitionController::class, 'exhibitionStatusChange']);
    Route::resource('exhibitions', ExhibitionController::class);


    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
