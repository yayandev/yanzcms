<?php

use App\Http\Controllers\Api\ProjectContoller;
use App\Http\Controllers\Api\SkillController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('skills', SkillController::class)->only(['index', 'show']);
Route::resource('projects', ProjectContoller::class)->only(['index', 'show']);

