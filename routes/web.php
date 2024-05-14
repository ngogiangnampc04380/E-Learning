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
    
    


    Route::get("/instructor-course", [InstructorController::class, "course"])->name("instructor-course");
    Route::get("/instructor-addcourse", [InstructorController::class, "addcourse"])->name("instructor-addcourse");
    Route::post("/save-course", [InstructorController::class, "saveCourse"])->name('saveCourse');
    Route::get("/instructor-coursedetails/{id}", [InstructorController::class, "chapter"])->name("instructor-coursedetails");
    Route::get("/instructor-dashboard", [InstructorController::class, "dashboard"])->name("instructor-dashboard");
    Route::get("/instructor-lesson/{id}", [InstructorController::class, "lesson"])->name("instructor-lesson");
    Route::post("/save-chapter", [InstructorController::class, "saveChapter"])->name("saveChapter");
    Route::post("/save-lesson", [InstructorController::class, "saveLesson"])->name("saveLesson");


    Route::post("/delete-course/{id}", [InstructorController::class, "deleteCourse"])->name("deleteCourse");
    Route::post("/delete-chapter/{id}", [InstructorController::class, "deleteChapter"])->name("deleteChapter");
    Route::post("/delete-lesson/{id}", [InstructorController::class, "deleteLesson"])->name("deleteLesson");


    Route::get("/edit-course/{id}", [InstructorController::class, "editCourse"])->name("editCourse");
    Route::post("/edit-course/{id}", [InstructorController::class, "saveEditCourse"])->name("saveEditCourse");

    Route::get("/edit-chapter/{id}", [InstructorController::class, "editChapter"])->name("editChapter");
    Route::post("/edit-chapter/{id}", [InstructorController::class, "saveEditChapter"])->name("saveEditChapter");


    Route::get("/edit-lesson/{id}", [InstructorController::class, "editLesson"])->name("editLesson");
    Route::post("/edit-lesson/{id}", [InstructorController::class, "saveEditLesson"])->name("saveEditLesson");


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
