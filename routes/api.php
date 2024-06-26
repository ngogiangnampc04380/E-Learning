<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\CoursesVideoController;
use App\Http\Controllers\Mentor\MentorControllerr;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/handle-upload', [CoursesVideoController::class, 'handleUpload']);
Route::post('/save-id-card-data', [MentorControllerr::class, 'saveIdCardData']);
Route::post('/create-lesson', [CoursesVideoController::class, 'uploadJob']);
// Route::post('/upload-resumable', [CoursesVideoController::class, 'uploadResumable']);