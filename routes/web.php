<?php
// ----------------------------Admin----------------------------*******

use Illuminate\Support\Facades\Route;

// ----------------------------client----------------------------*******

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\CoursesController;
use App\Http\Controllers\Client\InstructorController;
use App\Http\Controllers\Client\IndexAuthController;
use App\Http\Controllers\Client\UserDashboardController;
use App\Http\Controllers\Client\UserProfileController;
use App\Http\Controllers\Client\PostController;


// ----------------------------Mentor----------------------------*******
use App\Http\Controllers\Mentor\MentorRegisterController;
use App\Http\Controllers\Mentor\MentorProfileController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });




// ---------------------------------------Client-------------------------
Route::get("/", [HomeController::class, "index"])->name("Dashboard-client");


    Route::prefix('client')->name('client.')->group(function () {

    // -----------------------AUTH-------------------------
    Route::get("/login", [IndexAuthController::class, "login"])->name("Login");
    Route::get("/register", [IndexAuthController::class, "register"])->name("Register");
    Route::get("/forgot-password", [IndexAuthController::class, "forgotpass"])->name("ForgotPass");




    // ----------------------------------instructor-------------------------
    Route::get("/instructor-list", [InstructorController::class, "list"])->name("instructor-list");
    Route::get("/instructor-profile", [InstructorController::class, "profile"])->name("instructor-profile");
    Route::get("/dashboard-profile/{id}", [UserDashboardController::class, "dashboard"])->name("dashboard-profile");
    Route::get("/user-profile/{id}", [UserProfileController::class, "userprofile"])->name("user-profile");
    Route::post("/user-profile/{id}", [UserProfileController::class, "profile_edit"])->name("user-profile-edit");
    
    
    // ----------------------------------course-details-------------------------
    Route::get("/course-list", [CoursesController::class, "list"])->name("course-lists");
    Route::get("/course-details", [CoursesController::class, "detail"])->name("course-details");

    // -----------------------Mentor-------------------------
    Route::get("/mentor-register", [MentorRegisterController::class, "mentorRegister"])->name("mentor-register");
    Route::get("/mentor-profile", [MentorProfileController::class, "profile"])->name("mentor-profile");
    Route::get("/mentor-comment", [MentorProfileController::class, "comment"])->name("mentor-comment");
    Route::get("/mentor-favorite", [MentorProfileController::class, "favorite"])->name("mentor-favorite");



        // -----------------------Post-------------------------
    Route::get("/post-list", [PostController::class, "list"])->name("post-list");
    Route::get("/post-detail", [PostController::class, "detail"])->name("post-detail");

});
