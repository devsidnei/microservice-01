<?php

use App\Http\Controllers\Api\{
    CategoryControler,
    CompanyController
};

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => response()->json(['message' => env('APP_NAME')]));

Route::apiResource('categories', CategoryControler::class);
Route::apiResource('companies', CompanyController::class);
