<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AdminController;
use App\Models\Doctor;
use App\Models\GalleryItem;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Testimonial;
use App\Models\Blog;
use App\Models\Page;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\OpdScheduleController;
use App\Http\Controllers\EmpanelledController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'testimonials' => Testimonial::where('status', 'Active')
            ->whereNull('video_url')
            ->orderBy('sort_order')
            ->get(),
        'blogs' => Blog::where('status', 'Active')
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->limit(3)
            ->get(),
        'doctors' => Doctor::where('status', 'Active')
            ->orderBy('sort_order')
            ->limit(4)
            ->get()
    ]);
})->name('home');
Route::post('/appointments', [AppointmentController::class, 'store'])->middleware('throttle:5,1')->name('appointments.store');
Route::get('/doctors', fn () => view('pages.doctors', ['doctors' => Doctor::where('status', 'Active')->orderBy('sort_order')->orderBy('name')->get()]))->name('doctors.index');
Route::view('/appointment', 'pages.appointment')->name('appointment.create');
Route::get('/testimonials', fn () => view('pages.testimonials', ['testimonials' => Testimonial::where('status', 'Active')->orderBy('sort_order')->latest()->get()]))->name('testimonials');
Route::get('/blogs', fn () => view('pages.blogs', ['blogs' => Blog::where('status', 'Active')->orderByDesc('published_at')->orderByDesc('created_at')->paginate(9)]))->name('blogs.index');
Route::get('/blogs/{slug}', fn (string $slug) => view('pages.blog', [
    'blog' => Blog::where('status', 'Active')->where('slug', $slug)->firstOrFail(),
    'relatedBlogs' => Blog::where('status', 'Active')->where('slug', '!=', $slug)->orderByDesc('published_at')->limit(3)->get()
]))->name('blogs.show');
Route::get('/site-socials', function () {
    $settings = Setting::whereIn('key', ['social_facebook', 'social_instagram', 'social_linkedin', 'social_youtube', 'social_whatsapp', 'whatsapp_number'])->pluck('value', 'key');
    $whatsapp = $settings['social_whatsapp'] ?? $settings['whatsapp_number'] ?? null;
    if ($whatsapp && ! str_starts_with($whatsapp, 'http')) $whatsapp = 'https://wa.me/'.preg_replace('/\D+/', '', $whatsapp);
    return response()->json(array_filter([
        'facebook' => $settings['social_facebook'] ?? null,
        'instagram' => $settings['social_instagram'] ?? null,
        'linkedin' => $settings['social_linkedin'] ?? null,
        'youtube' => $settings['social_youtube'] ?? null,
        'whatsapp' => $whatsapp,
    ]));
})->name('site.socials');
Route::get('/site-footer', function () {
    $keys = ['footer_about', 'website_logo', 'site_phone', 'site_email', 'whatsapp_number', 'address', 'social_facebook', 'social_instagram', 'social_linkedin', 'social_youtube', 'social_whatsapp'];
    $settings = Setting::whereIn('key', $keys)->pluck('value', 'key');
    $whatsapp = $settings['social_whatsapp'] ?? $settings['whatsapp_number'] ?? null;
    if ($whatsapp && ! str_starts_with($whatsapp, 'http')) $whatsapp = 'https://wa.me/'.preg_replace('/\D+/', '', $whatsapp);
    return response()->json([
        'about' => $settings['footer_about'] ?? '',
        'logo' => $settings['website_logo'] ?? 'assets/hospital/images/aarogya-logo.png',
        'phone' => $settings['site_phone'] ?? '',
        'email' => $settings['site_email'] ?? '',
        'whatsapp' => $whatsapp,
        'address' => $settings['address'] ?? '',
        'pages' => Page::where('status', 'Active')->orderBy('title')->get(['title', 'slug']),
        'socials' => array_filter([
            'facebook' => $settings['social_facebook'] ?? null,
            'instagram' => $settings['social_instagram'] ?? null,
            'linkedin' => $settings['social_linkedin'] ?? null,
            'youtube' => $settings['social_youtube'] ?? null,
            'whatsapp' => $whatsapp,
        ]),
    ]);
})->name('site.footer');
Route::get('/patient-resources/empanelled-corporate/{slug}', [EmpanelledController::class, 'show'])->name('empanelled-corporate');
Route::get('/patient-resources/opd-schedule', [OpdScheduleController::class, 'publicIndex'])->name('opd-schedule');
Route::get('/patient-resources/feedback', fn () => view('pages.feedback', [
    'departments' => Service::where('status', 'Active')->orderBy('sort_order')->orderBy('name')->pluck('name'),
]))->name('feedback.create');
Route::post('/feedback', [FeedbackController::class, 'store'])->middleware('throttle:5,1')->name('feedback.store');
Route::get('/about', function () {
    $about = \App\Models\Setting::whereIn('key', [
        'about_image',
        'about_content',
        'chairman_image',
        'chairman_message',
        'why_choose_1_title',
        'why_choose_1_content',
        'why_choose_2_title',
        'why_choose_2_content',
        'why_choose_3_title',
        'why_choose_3_content',
        'why_choose_4_title',
        'why_choose_4_content',
        'why_choose_5_title',
        'why_choose_5_content',
        'why_choose_6_title',
        'why_choose_6_content',
        'our_mission',
        'our_vision',
        'quality_policy',
        'certificates'
    ])->pluck('value', 'key');
    return view('pages.about', compact('about'));
})->name('about');
Route::view('/robotic-surgery', 'home');
Route::get('/gallery', fn () => view('pages.gallery', ['galleryItems' => GalleryItem::where('status', 'Active')->orderBy('sort_order')->get()]))->name('gallery');
Route::view('/contact', 'pages.contact')->name('contact');
Route::get('/pages/{slug}', fn (string $slug) => view('pages.cms-page', ['page' => Page::where('status', 'Active')->where('slug', $slug)->firstOrFail()]))->name('pages.show');
Route::view('/emergency', 'home')->name('emergency');
Route::view('/privacy', 'home');
Route::view('/terms', 'home');
Route::view('/disclaimer', 'home');
Route::get('/services', fn () => view('pages.services', ['services' => Service::where('status', 'Active')->orderBy('sort_order')->orderBy('name')->paginate(9)]))->name('services.index');
Route::get('/services-data', fn () => Service::where('status', 'Active')->orderBy('sort_order')->orderBy('name')->get(['name', 'slug', 'description', 'image']))->name('services.data');
Route::get('/services/{slug}', fn (string $slug) => view('pages.service', [
    'service' => Service::where('status', 'Active')->where('slug', $slug)->firstOrFail(),
    'relatedServices' => Service::where('status', 'Active')->where('slug', '!=', $slug)->orderBy('sort_order')->limit(4)->get()
]))->name('services.show');
Route::redirect('/specialities', '/services', 301);
Route::get('/specialities/{slug}', fn (string $slug) => redirect()->route('services.show', ['slug' => $slug], 301));
Route::view('/doctors/{slug}', 'home');
Route::view('/patient-resources/{slug}', 'home');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('login');
    Route::post('/login', [AdminController::class, 'authenticate'])->middleware('throttle:5,1')->name('authenticate');
    Route::middleware('admin')->group(function () {
        Route::redirect('/', '/admin/dashboard');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
        Route::get('/patients/{patient}/edit', [PatientController::class, 'edit'])->name('patients.edit');
        Route::put('/patients/{patient}', [PatientController::class, 'update'])->name('patients.update');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::put('/profile', [AdminController::class, 'updateProfile'])->name('profile.update');
        Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
        Route::put('/settings', [AdminController::class, 'saveSettings'])->name('settings.save');
        Route::get('/about', [AdminController::class, 'about'])->name('about');
        Route::put('/about', [AdminController::class, 'saveAbout'])->name('about.save');
        Route::resource('opd-schedules', OpdScheduleController::class)->except(['show']);
        Route::get('/empanelled-corporate/{key}/edit', [EmpanelledController::class, 'edit'])->whereNumber('key')->name('empanelled.edit');
        Route::put('/empanelled-corporate/{key}', [EmpanelledController::class, 'update'])->whereNumber('key')->name('empanelled.update');
        Route::delete('/empanelled-images/{empanelledSection}/{index}', [EmpanelledController::class, 'removeImage'])->whereNumber('index')->name('empanelled.image.destroy');
        Route::redirect('/specialities', '/admin/services', 301);
        Route::get('/specialities/{path}', fn (string $path) => redirect('/admin/services/'.$path, 301))->where('path', '.*');
        Route::get('/{resource}', [AdminController::class, 'index'])->name('resource.index');
        Route::get('/{resource}/create', [AdminController::class, 'create'])->name('resource.create');
        Route::post('/{resource}', [AdminController::class, 'store'])->name('resource.store');
        Route::get('/{resource}/{id}/edit', [AdminController::class, 'edit'])->name('resource.edit');
        Route::put('/{resource}/{id}', [AdminController::class, 'update'])->name('resource.update');
        Route::delete('/{resource}/{id}', [AdminController::class, 'destroy'])->name('resource.destroy');
    });
});
