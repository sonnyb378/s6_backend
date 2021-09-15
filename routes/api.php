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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CreativeController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProductTypeController;

Route::get("/", function(Request $request) {
    return response()->json(['message' => 'test route']);
});

// Route::prefix("user")->group(function() {    
//     Route::get("/{id}/orders", [UserController::class, "orders"]);
//     Route::get("/{id}/creatives", [UserController::class, "creatives"]);
// });

// Route::prefix("order")->group(function() {    
//     Route::get("/{id}/user", [OrderController::class, "user"]);
//     // Route::get("/vendor/{id}", [OrderController::class, "vendor"]);
// });

// Route::prefix("creative")->group(function() {    
//     Route::get("/{id}/user", [CreativeController::class, "user"]);
// });

Route::prefix("vendor")->group(function() {    
    // Route::get("/{id}/product_type", [VendorController::class, "product_type"]);
    Route::get("/{id}/orders", [VendorController::class, "orders"]);
});

// Route::prefix("producttype")->group(function() {    
//     Route::get("/{id}/vendor", [ProductTypeController::class, "vendor"]);
// });