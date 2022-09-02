<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('user-signup', [App\Http\Controllers\UserController::class, 'userSignUp']);
Route::post('user-login', [App\Http\Controllers\UserController::class, 'userLogin']);
Route::get('user/{email}', [App\Http\Controllers\UserController::class, 'userDetail']);

//Route Description
Route::get('/route-descriptions', [App\Http\Controllers\Admin\RouteController::class,'index'])->name('Route_Description.all');
Route::post('/route-descriptions-save', [App\Http\Controllers\Admin\RouteController::class,'store'])->name('Route_Description.store');
Route::get('/route-descriptions/{Route_Description}', [App\Http\Controllers\Admin\RouteController::class,'show'])->name('Route_Description.show');
Route::put('/route-descriptions/{Route_Description}', [App\Http\Controllers\Admin\RouteController::class,'update'])->name('Route_Description.update');
Route::delete('/route-descriptions/{Route_Description}', [App\Http\Controllers\Admin\RouteController::class,'destroy'])->name('Route_Description.destroy');
Route::get('/route-descriptions-list', [App\Http\Controllers\Admin\RouteController::class,'GetList'])->name('Route_Description.list');
Route::get('/GetDataByStartPoint/{id}', [App\Http\Controllers\Admin\RouteController::class,'GetDataByStartPoint'])->name('Route_Description.GetDataByStartPoint');

//BusInfo
Route::get('/bus-infos', [App\Http\Controllers\Admin\BusController::class,'index'])->name('BusInfos.all');
Route::post('/bus-infos-save', [App\Http\Controllers\Admin\BusController::class,'store'])->name('BusInfos.store');
Route::get('/bus-infos/{BusInfo}', [App\Http\Controllers\Admin\BusController::class,'show'])->name('BusInfos.show');
Route::put('/bus-infos/{BusInfo}', [App\Http\Controllers\Admin\BusController::class,'update'])->name('BusInfos.update');
Route::delete('/bus-infos/{BusInfo}', [App\Http\Controllers\Admin\BusController::class,'destroy'])->name('BusInfos.destroy');
Route::get('/bus-infos-list', [App\Http\Controllers\Admin\BusController::class,'GetList'])->name('BusInfos.list');
Route::get('/get-busInfo-by-busNo/{id}', [App\Http\Controllers\Admin\BusController::class,'GetDataByBusNo'])->name('BusInfos.GetDataByBusNo');


//Passanger Information
Route::get('/passanger-infos', [App\Http\Controllers\Admin\PassangerController::class,'index'])->name('PassamgerInfos.all');
Route::post('/passanger-infos-savephpphp', [App\Http\Controllers\Admin\PassangerController::class,'store'])->name('PassamgerInfos.store');
Route::get('/passanger-infos/{PassangerInfo}', [App\Http\Controllers\Admin\PassangerController::class,'show'])->name('PassamgerInfos.show');
Route::put('/passanger-infos/{PassangerInfo}', [App\Http\Controllers\Admin\PassangerController::class,'update'])->name('PassamgerInfos.update');
Route::delete('/passanger-infos/{PassangerInfo}', [App\Http\Controllers\Admin\PassangerController::class,'destroy'])->name('PassamgerInfos.destroy');


//Stuff Information
Route::get('/Stuff-infos', [App\Http\Controllers\Admin\StuffController::class,'index'])->name('StuffInfos.all');
Route::post('/Stuff-infos-save', [App\Http\Controllers\Admin\StuffController::class,'store'])->name('StuffInfos.store');
Route::get('/Stuff-infos/{StuffInfo}', [App\Http\Controllers\Admin\StuffController::class,'show'])->name('StuffInfos.show');
Route::put('/Stuff-infos/{StuffInfo}', [App\Http\Controllers\Admin\StuffController::class,'update'])->name('StuffInfos.update');
Route::delete('/Stuff-infos/{StuffInfo}', [App\Http\Controllers\Admin\StuffController::class,'destroy'])->name('StuffInfos.destroy');
Route::get('/Stuff-infos-list', [App\Http\Controllers\Admin\StuffController::class,'GetList'])->name('StuffInfos.list');

//Time Schedule Information
Route::get('/timeSchedules', [App\Http\Controllers\Admin\TimeScheduleController::class,'index'])->name('time-Schedules.all');
Route::post('/timeSchedules-save', [App\Http\Controllers\Admin\TimeScheduleController::class,'store'])->name('time-Schedules.store');
Route::get('/timeSchedules/{TimeSchedule}', [App\Http\Controllers\Admin\TimeScheduleController::class,'show'])->name('time-Schedules.show');
Route::put('/timeSchedules/{TimeSchedule}', [App\Http\Controllers\Admin\TimeScheduleController::class,'update'])->name('time-Schedules.update');
Route::delete('/timeSchedules/{TimeSchedule}', [App\Http\Controllers\Admin\TimeScheduleController::class,'destroy'])->name('time-Schedules.destroy');
Route::get('/timeSchedulesList', [App\Http\Controllers\Admin\TimeScheduleController::class,'GetList'])->name('time-Schedules.list');


//Ticket Type Information
Route::get('/TicketTypes', [App\Http\Controllers\Admin\TicketTypeController::class,'index'])->name('TicketTypes.all');
Route::post('/TicketTypes-save', [App\Http\Controllers\Admin\TicketTypeController::class,'store'])->name('TicketTypes.store');
Route::get('/TicketTypes/{TicketType}', [App\Http\Controllers\Admin\TicketTypeController::class,'show'])->name('TicketTypes.show');
Route::put('/TicketTypes/{TicketType}', [App\Http\Controllers\Admin\TicketTypeController::class,'update'])->name('TicketTypes.update');
Route::delete('/TicketTypes/{TicketType}', [App\Http\Controllers\Admin\TicketTypeController::class,'destroy'])->name('TicketTypes.destroy');
Route::get('/Ticket-Type-List', [App\Http\Controllers\Admin\TicketTypeController::class,'GetList'])->name('TicketTypes.List');

//Ticket price Information
Route::get('/TicketPrices', [App\Http\Controllers\Admin\TicketPriceController::class,'index'])->name('TicketPrice.all');
Route::post('/TicketPrices-save', [App\Http\Controllers\Admin\TicketPriceController::class,'store'])->name('TicketPrice.store');
Route::get('/TicketPrices/{TicketPrice}', [App\Http\Controllers\Admin\TicketPriceController::class,'show'])->name('TicketPrice.show');
Route::put('/TicketPrices/{TicketPrice}', [App\Http\Controllers\Admin\TicketPriceController::class,'update'])->name('TicketPrice.update');
Route::delete('/TicketPrices/{TicketPrice}', [App\Http\Controllers\Admin\TicketPriceController::class,'destroy'])->name('TicketPrice.destroy');
Route::get('/TicketPrices-List', [App\Http\Controllers\Admin\TicketPriceController::class,'GetList'])->name('TicketPrice.List');
Route::get('/get-TicketPrices-by-type/{id}', [App\Http\Controllers\Admin\TicketPriceController::class,'GetDataByType'])->name('TicketPrice.get-TicketPrices-by-type');

//Schedule Information
Route::get('/Schedules', [App\Http\Controllers\Admin\ScheduleController::class,'index'])->name('Schedules.all');
Route::post('/Schedules-save', [App\Http\Controllers\Admin\ScheduleController::class,'store'])->name('Schedules.store');
Route::get('/Schedules/{Schedule}', [App\Http\Controllers\Admin\ScheduleController::class,'show'])->name('Schedules.show');
Route::put('/Schedules/{Schedule}', [App\Http\Controllers\Admin\ScheduleController::class,'update'])->name('Schedules.update');
Route::delete('/Schedules/{Schedule}', [App\Http\Controllers\Admin\ScheduleController::class,'destroy'])->name('Schedules.destroy');
Route::get('/GetDateScheduleList', [App\Http\Controllers\Admin\ScheduleController::class,'GetList'])->name('Schedules.list');


//Boking
Route::get('/booking-infos-schedule-data', [App\Http\Controllers\Admin\BookingControler::class,'index'])->name('Booking.all');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
