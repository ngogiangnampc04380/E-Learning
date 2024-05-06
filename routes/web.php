<?php
// ----------------------------Admin----------------------------*******

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MentorController;
use App\Http\Controllers\Admin\BlogController;
// ----------------------------client----------------------------*******

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\CoursesController;
use App\Http\Controllers\Client\InstructorController;
use App\Http\Controllers\Client\IndexAuthController;
use App\Http\Controllers\Client\UserProfileController;

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
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get("/dashboard", [DashboardController::class, "index"])->name("Dashboard-admin");

    // -----------------------AUTH-------------------------
    Route::get("/login", [AuthController::class, "login"])->name("Login");
    Route::get("/register", [AuthController::class, "register"])->name("Register");
    Route::get("/forgot-password", [AuthController::class, "forgotpass"])->name("ForgotPass");

    // -----------------------QUẢN LÝ NGƯỜI DÙNG-------------------------
    Route::get("/list-user", [UserController::class, "list"])->name("ListUser");
    Route::get("/edit-user", [UserController::class, "edit"])->name("EditUser");

    // -----------------------QUẢN LÝ CỐ VẤN-------------------------
    Route::get("/list-mentor", [MentorController::class, "list"])->name("ListMentor");
    Route::get("/edit-mentor", [MentorController::class, "edit"])->name("EditMentor");

    // -----------------------QUẢN LÝ BÀI VIẾT-------------------------
    Route::get("/list-blog", [BlogController::class, "list"])->name("ListBlog");
    Route::get("/add-blog", [BlogController::class, "add"])->name("AddBlog");
    Route::get("/edit-blog", [BlogController::class, "edit"])->name("EditBlog");
});



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
    Route::get("/user-profile", [UserProfileController::class, "profile"])->name("user-profile");


    // ----------------------------------course-details-------------------------
    Route::get("/course-list", [CoursesController::class, "list"])->name("course-lists");
    Route::get("/course-details", [CoursesController::class, "detail"])->name("course-details");

    // -----------------------Mentor-------------------------
    Route::get("/mentor-register", [MentorRegisterController::class, "mentorRegister"])->name("mentor-register");
    Route::get("/mentor-profile", [MentorProfileController::class, "profile"])->name("mentor-profile");

});
