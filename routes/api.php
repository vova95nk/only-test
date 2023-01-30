<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/cars',
    'as' => 'cars.',
], function () {
    Route::get('/available/by-driver-id', \App\Http\Actions\AvailableCarList::class)->name('available.list.by-driver-id');
});
