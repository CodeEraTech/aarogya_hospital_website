<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::post('/appointments', [AppointmentController::class, 'store'])->middleware('throttle:5,1')->name('appointments.store');
Route::view('/doctors', 'pages.doctors')->name('doctors.index');
Route::view('/patient-resources/empanelled-corporate', 'pages.empanelled-corporate')->name('empanelled-corporate');
Route::view('/patient-resources/opd-schedule', 'pages.opd-schedule')->name('opd-schedule');
Route::view('/patient-resources/feedback', 'pages.feedback')->name('feedback.create');
Route::post('/feedback', [FeedbackController::class, 'store'])->middleware('throttle:5,1')->name('feedback.store');
Route::view('/about', 'pages.about')->name('about');
Route::view('/robotic-surgery', 'home');
Route::view('/gallery', 'pages.gallery')->name('gallery');
Route::view('/testimonials', 'home');
Route::view('/contact', 'home');
Route::view('/emergency', 'home')->name('emergency');
Route::view('/privacy', 'home');
Route::view('/terms', 'home');
Route::view('/disclaimer', 'home');
Route::view('/specialities/{slug?}', 'home');
Route::view('/doctors/{slug}', 'home');
Route::view('/patient-resources/{slug}', 'home');
