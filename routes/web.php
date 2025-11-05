<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require_once __DIR__ . '/admin/routes.php';
require __DIR__ . '/front.php';

Route::get('/test-raw-mail', function () {
    $toEmail = 'harshitk@pearlorganisation.com';
    $subject = 'Test Email';
    $body = 'This is a test email sent using raw content to check if email functionality is working.';
    try {
        Mail::raw($body, function ($message) use ($toEmail, $subject) {
            $message->to($toEmail)
                    ->subject($subject);
        });
        Log::channel('email')->info('Test email sent successfully.', ['to' => $toEmail, 'subject' => $subject]);
        return response()->json(['message' => 'Raw test email sent successfully!'], 200);
    } catch (\Exception $e) {
        Log::channel('email')->error('Failed to send test email.', ['error' => $e->getMessage(), 'to' => $toEmail]);
        return response()->json(['message' => 'Failed to send email.', 'error' => $e->getMessage()], 500);
    }
});

Route::post('/contact-us', [HomeController::class, 'contactUsStore'])->name('contactUs-store');
// Route::get('/portfolio-detail',  [HomeController::class, 'portfoliodetails'])->name('portfolio-detail');
Route::get('/portfolio-detail/{id}', [HomeController::class, 'portfoliodetails'])->name('portfolio-detail');








Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Route::get('/services', function () {
//     return view('website.Services');
// })->name('services');
Route::get('/exhibition-event', function () {
    return view('website.exhibition');
})->name('exhibition');
Route::get('/interior', function () {
    return view('website.interior');
})->name('interior');
Route::get('/exhibition-in-india', function () {
    return view('website.exhibition-in-india');
})->name('exhibition-in-india');
Route::get('/tradeshow-europe', function () {
    return view('website.tradeshow-europe');
})->name('tradeshow-europe');
// Route::get('/portfolio-new', function () {
//     return view('website.portfolio-new');
// })->name('portfolio-new');

Route::get('/blogs', function () {
    return view('website.blog');
})->name('blog');
Route::get('/team', function () {
    return view('website.team');
})->name('team');


Route::get('/blogsdetails', function () {
    return view('website.blogdetails');
})->name('blogdetails');


// Route::get('/portfolio-detail', function () {
//     return view('website.portfoliodetail');
// })->name('portfolio-detail');




// Route::get('/admin', function () {
//     return view('admin.dashboard');
// })->name('admin.dashboard');

Route::get('/user', function () {
    return view('admin.dashboard');
})->name('admin.user.list');

Route::get('/word', function () {
    return view('admin.dashboard');
})->name('admin.dictionary-word');

Route::get('/laguse', function () {
    return view('admin.dashboard');
})->name('change.language');

Route::get('/front', function () {
    return view('admin.dashboard');
})->name('front');




Route::get('/admin.logout', function () {
    return view('admin.dashboard');
})->name('admin.logout');
