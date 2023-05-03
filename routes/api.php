<?php

use App\Http\Controllers\API\CandidateContorller;
use App\Http\Controllers\API\CandidateController;
use App\Http\Controllers\API\JobController;
use App\Http\Controllers\API\SkillController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('candidate', [CandidateContorller::class, 'index']);
Route::post('candidate/store', [CandidateContorller::class, 'store']);
Route::put('candidate/update/{id}', [CandidateContorller::class, 'update']);

Route::get('skill', [SkillController::class, 'index']);
Route::post('skill/store', [SkillController::class, 'store']);
Route::put('skill/update/{id}', [SkillController::class, 'update']);
Route::delete('skill/{id}', [SkillController::class, 'destroy']);
Route::get('skill/restore/{id}', [SkillController::class, 'restore']);

Route::get('job', [JobController::class, 'index']);
Route::post('job/store', [JobController::class, 'store']);
Route::put('job/update/{id}', [JobController::class, 'update']);
Route::delete('job/{id}', [JobController::class, 'destroy']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
