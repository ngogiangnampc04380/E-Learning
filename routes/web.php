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

use App\Http\Controllers\Client\LogoutController;
use App\Http\Controllers\Client\RegisterController;
use App\Http\Controllers\Client\PasswordController;

// ----------------------------Mentor----------------------------*******
use App\Http\Controllers\Mentor\MentorControllerr;


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
    // Route::get("/login", [IndexAuthController::class, "login"])->name("Login");
    Route::get("/register", [IndexAuthController::class, "register"])->name("Register");
    Route::get("/forgot-password", [IndexAuthController::class, "forgotpass"])->name("ForgotPass");


    // ----------------------------------instructor-------------------------
    Route::get("/instructor-list", [InstructorController::class, "list"])->name("instructor-list");
    Route::get("/instructor-profile", [InstructorController::class, "profile"])->name("instructor-profile");
    Route::get("/dashboard-profile/", [UserDashboardController::class, "dashboard"])->name("dashboard-profile");
    Route::get("/user-profile/", [UserProfileController::class, "userprofile"])->name("user-profile");
    Route::post("/user-profile/", [UserProfileController::class, "profile_edit"])->name("user-profile-edit");




    Route::get("/instructor-course/{id}", [InstructorController::class, "course"])->name("instructor-course");
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
    Route::get("/course-checkout/{id}", [CoursesController::class, "checkout"])->name("course-checkout");
    Route::post("/checkout-submit", [CoursesController::class, "checkoutSubmit"])->name("checkout-submit");
    Route::get("/course-pricing/{id}", [CoursesController::class, "pricing"])->name("course-pricing");




    // -----------------------Mentor-------------------------

        // -----------------------Post-------------------------
    Route::get("/post-list", [PostController::class, "list"])->name("post-list");
    Route::get("/post-detail", [PostController::class, "detail"])->name("post-detail");
    // CHƯA HOÀN THÀNH
    // Route::get("/mentor-register", [MentorControllerr::class, "mentorRegister"])->name("mentor-register");
    // Route::post('/mentor/register', [MentorControllerr::class, 'handleRegister'])->name("mentor-handleRegister");
    // Route::get("/mentor-profile", [MentorControllerr::class, "profile"])->name("mentor-profile");
    // Route::get("/upload_ID_Card", [MentorControllerr::class, "upload_ID_Card"])->name("upload-id-card");
    // Route::get("/takingPicture", [MentorControllerr::class, "takingPicture"])->name("online-id-card");

});
Route::prefix('password')->group(function () {
    Route::get('enter-email', [PasswordController::class, 'enterEmail'])->name('enter-email');
    Route::post('enter-email', [PasswordController::class, 'handleEnterEmail']);
    Route::redirect('/', 'password/enter-email');
    Route::get('confirm-code', [PasswordController::class, 'confirmCode'])->name('confirm-code');
    Route::post('confirm-code', [PasswordController::class, 'handleConfirmCode']);
    Route::get('new-password', [PasswordController::class, 'newPassword'])->name('new-password');
    Route::post('new-password', [PasswordController::class, 'handleNewPassword']);
});

Route::get('/login', [IndexAuthController::class, 'index'])->name('login');
Route::post('/login', [IndexAuthController::class, 'login']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/logout', [LogoutController::class, 'index'])->name('logout')->middleware('auth');
Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth');
