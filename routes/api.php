<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ApiKeyMiddleware;
use App\Http\Controllers\Api\{ActivityController, BuildingController, OrganizationController};

Route::prefix('v1')->middleware([ApiKeyMiddleware::class])->group(function () {
    Route::prefix('activities')->group(function () {
        Route::get('/', [ActivityController::class, 'index']);
        Route::get('/{id}/organizations', [ActivityController::class, 'organizations']);
    });

    Route::prefix('buildings')->group(function () {
        Route::get('/', [BuildingController::class, 'index']);
        Route::get('/{id}/organizations', [BuildingController::class, 'organizations']);
        Route::get('/nearby/radius', [BuildingController::class, 'nearbyRadius']);
        Route::get('/nearby/rectangle', [BuildingController::class, 'nearbyRectangle']);
    });

    Route::prefix('organizations')->group(function() {
        Route::get('/', [OrganizationController::class, 'index']);
        Route::get('/{id}', [OrganizationController::class, 'show']);
        Route::get('/nearby/radius', [OrganizationController::class, 'nearbyRadius']);
        Route::get('/nearby/rectangle', [OrganizationController::class, 'nearbyRectangle']);
    });
});
