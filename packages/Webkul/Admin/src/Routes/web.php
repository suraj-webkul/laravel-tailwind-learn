<?php

use Illuminate\Support\Facades\Route;
use Webkul\Admin\Http\Controllers\CategoryController;




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::resource('category', CategoryController::class);
});


?>