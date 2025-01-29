<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarBookingController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\EnquiryLeadController;
use App\Http\Controllers\FlightBookingController;
use App\Http\Controllers\HotelBookingController;
use App\Http\Controllers\HotelDestinationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SiteSeoController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TourBookingController;
use App\Http\Controllers\TourCategoryController;
use App\Http\Controllers\TourTypeController;
use App\Http\Controllers\TrainBookingController;
use App\Http\Controllers\VolvoBookingController;




Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::apiResource('v1/about', AboutController::class);
Route::apiResource('v1/cars', CarController::class);
Route::apiResource('v1/car-bookings', CarBookingController::class);
Route::apiResource('v1/contact-us', ContactUsController::class);
Route::apiResource('v1/destinations', DestinationController::class);
Route::apiResource('v1/enquiries', EnquiryController::class);
Route::apiResource('v1/enquiry-leads', EnquiryLeadController::class);
Route::apiResource('v1/flight-bookings', FlightBookingController::class);
Route::apiResource('v1/hotel-bookings', HotelBookingController::class);
Route::apiResource('v1/hotel-destinations', HotelDestinationController::class);
Route::apiResource('v1/reviews', ReviewController::class);
Route::apiResource('v1/services', ServiceController::class);
Route::apiResource('v1/site-seo', SiteSeoController::class);
Route::apiResource('v1/sliders', SliderController::class);
Route::apiResource('v1/tour-bookings', TourBookingController::class);
Route::apiResource('v1/tour-categories', TourCategoryController::class);
Route::apiResource('v1/tour-types', TourTypeController::class);
Route::apiResource('v1/train-bookings', TrainBookingController::class);
Route::apiResource('v1/volvo-bookings', VolvoBookingController::class);
