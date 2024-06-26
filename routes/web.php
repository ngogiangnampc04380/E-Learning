<?php
// ----------------------------Admin----------------------------*******

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MentorController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Client\CheckoutController;
// ----------------------------client----------------------------*******

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\CoursesController;
use App\Http\Controllers\Client\InstructorController;
use App\Http\Controllers\Client\IndexAuthController;
use App\Http\Controllers\Client\UserDashboardController;
use App\Http\Controllers\Client\UserProfileController;
use App\Http\Controllers\Client\PostController;

use App\Http\Controllers\Client\SearchController;
use App\Http\Controllers\CourseCategoryController;


use App\Http\Controllers\Client\LogoutController;
use App\Http\Controllers\Client\RegisterController;
use App\Http\Controllers\Client\PasswordController;
use App\Http\Controllers\Client\CoursesVideoController;
// ----------------------------Mentor----------------------------*******
use App\Http\Controllers\Mentor\MentorControllerr;
use App\Http\Controllers\Mentor\SaleController;




// ---------------------------------------Client-------------------------
Route::get("/", [HomeController::class, "index"])->name("Dashboard-client");
Route::get("/error", [HomeController::class, "error"])->name("error");
// -----login Google
Route::get('/login/google', [IndexAuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [IndexAuthController::class, 'handleGoogleCallback']);
// ------end----

Route::get('/login', [IndexAuthController::class, 'index'])->name('login');
Route::post('/login', [IndexAuthController::class, 'login']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/logout', [LogoutController::class, 'index'])->name('logout')->middleware('auth');
Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth');


Route::prefix('password')->group(function () {
    Route::get('enter-email', [PasswordController::class, 'enterEmail'])->name('enter-email');
    Route::post('enter-email', [PasswordController::class, 'handleEnterEmail']);
    Route::redirect('/', 'password/enter-email');
    Route::get('confirm-code', [PasswordController::class, 'confirmCode'])->name('confirm-code');
    Route::post('confirm-code', [PasswordController::class, 'handleConfirmCode']);
    Route::get('new-password', [PasswordController::class, 'newPassword'])->name('new-password');
    Route::post('new-password', [PasswordController::class, 'handleNewPassword']);
});
Route::prefix('client')->name('client.')->group(function () {
    // ----------------------------------instructor-------------------------
    Route::get("/instructor-list", [InstructorController::class, "list"])->name("instructor-list");
    // Route::get("/instructor-profile", [InstructorController::class, "profile"])->name("instructor-profile");
    Route::get("/mentor-profile/{id}", [InstructorController::class, "mentor_detail"])->name("mentor_detail");

    Route::get("/dashboard-profile/", [UserDashboardController::class, "dashboard"])->name("dashboard-profile");
    Route::get("/user-profile/", [UserProfileController::class, "userprofile"])->name("user-profile");
    Route::post("/user-profile/", [UserProfileController::class, "profile_edit"])->name("user-profile-edit");
    Route::post("/update_education/", [UserProfileController::class, "update_education"])->name("update_education");
    Route::get("/user-profile/{id}", [UserProfileController::class, "education"])->name("user-edu");
    // delete
    // Hiển thị form xác nhận vô hiệu hóa tài khoản
    Route::get('/disable-account', [UserProfileController::class, 'showDisableAccountForm'])->name('disable-account-form');

    // Xử lý yêu cầu vô hiệu hóa tài khoản
    Route::post('/disable-account', [UserProfileController::class, 'disableAccount'])->name('disable-account');


    // education
    Route::post("/education", [UserProfileController::class, "storeEducation"])->name("storeEducation");
    Route::post("/education/{id}", [UserProfileController::class, "updateEducation"])->name("updateEducation");
    Route::post("/education/delete/{id}", [UserProfileController::class, "deleteEducation"])->name("deleteEducation");
    Route::get("/education/{id}", [UserProfileController::class, "getEducation"])->name("getEducation");

    Route::get('/courses/{id}/edit', [CoursesController::class, 'editCourse'])->name('editCourse');
    Route::post('/courses/{id}/add-chapter', [CoursesController::class, 'addChapter'])->name('addChapter');
    Route::post('/courses/{id}/update', [CoursesController::class, 'updateCourse'])->name('updateCourse');
    // instructor
    Route::get("/instructor-course/{id}", [CoursesController::class, "course"])->name("instructor-course");
    Route::get("/create-course", [CoursesController::class, "addcourse"])->name("create-course");
    Route::post("/save-course", [CoursesController::class, "saveCourse"])->name('saveCourse');
    Route::get('/courses/autoAddChapter/{course_id}', [CoursesController::class, 'autoAddChapter'])->name('autoAddChapter');
    Route::delete('/courses/deleteChapter/{id}', [CoursesController::class, 'deleteChapter'])->name('deleteChapter');
    Route::put('/courses/chapters/{chapter}', [CoursesController::class, 'updateChapters'])->name('updateChapter');

    Route::post('/client/addLesson', [CoursesController::class, 'addLesson'])->name('addLesson');
    Route::get('/client/getLessonsByChapterId/{chapterId}', [CoursesController::class, 'getLessonsByChapterId'])->name('getLessonsByChapterId');
    Route::delete('/courses/lessons/{lesson}', [CoursesController::class, 'destroy'])->name('deleteLesson');
    Route::put('/lessons/{id}', [CoursesController::class, 'updateLesson'])->name('updateLesson');
    Route::get("/instructor-coursedetails/{id}", [CoursesController::class, "chapter"])->name("instructor-coursedetails");
    Route::get("/instructor-dashboard", [CoursesController::class, "dashboard"])->name("instructor-dashboard");
    Route::get("/instructor-lesson/{id}", [CoursesController::class, "lesson"])->name("instructor-lesson");
    Route::post("/save-chapter", [CoursesController::class, "saveChapter"])->name("saveChapter");
    Route::post("/save-lesson", [CoursesController::class, "saveLesson"])->name("saveLesson");

    Route::post("/delete-course/{id}", [CoursesController::class, "deleteCourse"])->name("deleteCourse");
    
    Route::post('/courses/{course}/submit', [CoursesController::class, 'submitCourse'])->name('submitCourse');
    Route::post('/recall-course/{id}', [CoursesController::class, 'recallCourse'])->name('recallCourse');
    // ----------------------------------course-details-------------------------

    Route::get("/course-list", [CoursesController::class, "list"])->name("course-lists");
    Route::get("/course-details", [CoursesController::class, "detail"])->name("course-details");
    Route::get("/course-checkout/{id}", [CoursesController::class, "checkout"])->name("course-checkout");
    Route::post("/checkout-submit", [CoursesController::class, "checkoutSubmit"])->name("checkout-submit");
    Route::get('/course-pricing/{id}', [CoursesController::class, 'pricing'])->name('course-pricing');
    Route::get('/lesson', [CoursesController::class, 'lesson'])->name('lesson');




    // ----------------------------- Search ------------------------------
    Route::get("/search", [SearchController::class, "search"])->name("search");

    // ----------------------------------CHECKOUT--------------------------
    Route::post("/checkout", [CheckoutController::class, "online_pay"])->name('checkout');

    Route::get("/thank", [CheckoutController::class, "thank"])->name("thank");

    // -----------------------Mentor-------------------------
    // -----------------------Post-------------------------
    Route::get('/post-list', [PostController::class, 'posts'])->name('post-list');
    Route::get('/post-detail/{slug}', [PostController::class, 'show'])->name('post-detail');
    // Route::get('/post_category/{slug}', [PostController::class, 'show'])->name('category.show');
    Route::get('/category-detail/{slug}', [PostController::class, 'category_show'])->name('category-detail');
});

Route::get('/mentor-register', [MentorControllerr::class, "mentorRegister"])->name("mentor-register")->middleware('auth');
Route::post('/mentor-register', [MentorControllerr::class, 'handleRegister'])->middleware('auth');
Route::get('/mentor-profile', [MentorControllerr::class, "profile"])->name("mentor-profile");
Route::get('/upload_ID_Card', [MentorControllerr::class, "upload_ID_Card"])->name("upload-id-card");
Route::post('/upload_ID_Card', [MentorControllerr::class, 'handleUploadIdCard'])->middleware('auth');
Route::post('/mentor/save-id-card-data', [MentorControllerr::class, 'saveIdCardData'])->name('mentor-save-id-card');

// -----------------------Sales-------------------------
Route::get('/sale-course', [SaleController::class, 'showSaleCourseForm'])->name('mentor.show-sale-course');
Route::post('/sale-course', [SaleController::class, 'storeSale'])->name('mentor.store-sale');

Route::get('/mentor/sale-list', [SaleController::class, 'showSaleCourseList'])->name('mentor.list-sale-course');

Route::get('/mentor/edit-sale/{id}', [SaleController::class, 'editSales'])->name('mentor.edit-sale');
Route::post('/mentor/update-sale/{id}', [SaleController::class, 'updateSales'])->name('mentor.update-sale');

Route::delete('/mentor/delete-sale/{id}', [SaleController::class, 'deleteSale'])->name('mentor.delete-sale');

Route::post('/apply-promotion', [SaleController::class, 'applyPromotion'])->name('apply.promotion');
