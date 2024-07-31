<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LotController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\BidController;


// Open Routes
Route::post("register", [AuthController::class, "register"]);
Route::post("login", [AuthController::class, "login"]);

// Protected Routes
Route::group([
    "middleware" => ["auth:api"]
], function(){

    Route::get("profile", [AuthController::class, "profile"]);

    Route::get("logout", [AuthController::class, "logout"]);

    Route::get('lots',[LotController::class,'showLots']);

    Route::post('lots',[LotController::class,'createLot']);

    Route::patch('lots/{id}',[LotController::class,'updateLot']);

    Route::get('auctions',[AuctionController::class,'showActions']);

    Route::post('auctions',[AuctionController::class,'createAuction']);

    Route::patch('auctions/{id}',[AuctionController::class,'endAuction']);

    Route::delete('auctions/{id}',[AuctionController::class,'deleteAuction']);

    Route::post('bids',[BidController::class,'createBid']);

    Route::get('bids',[BidController::class,'showBisOnAuctions']);
});
