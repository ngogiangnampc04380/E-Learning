<?php
// ----------------------------Admin----------------------------*******

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\CheckoutController;

// ----------------------------client----------------------------*******

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\CoursesController;
use App\Http\Controllers\Client\InstructorController;
use App\Http\Controllers\Client\IndexAuthController;
use App\Http\Controllers\Client\UserDashboardController;
use App\Http\Controllers\Client\UserProfileController;
use App\Http\Controllers\Client\PostController;
use App\Http\Controllers\Client\SupportController;

use App\Http\Controllers\Client\SearchController;


use App\Http\Controllers\Client\LogoutController;
use App\Http\Controllers\Client\RegisterController;
use App\Http\Controllers\Client\PasswordController;
use App\Http\Controllers\Client\QuizCourseController;
// ----------------------------Mentor----------------------------*******
use App\Http\Controllers\Mentor\MentorControllerr;
use App\Http\Controllers\Client\SaleController;



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
    Route::get('/courses', [CoursesController::class, 'list'])->name('course-lists');

    // instructor
    Route::get("/instructor-course/{id}", [CoursesController::class, "course"])->name("instructor-course");
    Route::get("/create-course", [CoursesController::class, "addcourse"])->name("create-course");
    Route::post("/save-course", [CoursesController::class, "saveCourse"])->name('saveCourse');
    Route::get('/courses/autoAddChapter/{course_id}', [CoursesController::class, 'autoAddChapter'])->name('autoAddChapter');
    Route::delete('/courses/deleteChapter/{id}', [CoursesController::class, 'deleteChapter'])->name('deleteChapter');
    Route::post('/courses/chapters/{chapter}', [CoursesController::class, 'updateChapters'])->name('updateChapter');

    Route::post('/client/addLesson', [CoursesController::class, 'addLesson'])->name('addLesson');
    Route::get('/client/getLessonsByChapterId/{chapterId}', [CoursesController::class, 'getLessonsByChapterId'])->name('getLessonsByChapterId');
    Route::delete('/courses/lessons/{lesson}', [CoursesController::class, 'destroy'])->name('deleteLesson');
    Route::post('/lessons/{id}', [CoursesController::class, 'updateLesson'])->name('updateLesson');
    Route::get("/instructor-coursedetails/{id}", [CoursesController::class, "chapter"])->name("instructor-coursedetails");
    Route::get("/instructor-dashboard", [CoursesController::class, "dashboard"])->name("instructor-dashboard");
    Route::get("/instructor-lesson/{id}", [CoursesController::class, "lesson"])->name("instructor-lesson");
    Route::post("/save-chapter", [CoursesController::class, "saveChapter"])->name("saveChapter");
    Route::post("/save-lesson", [CoursesController::class, "saveLesson"])->name("saveLesson");

    Route::post("/delete-course/{id}", [CoursesController::class, "deleteCourse"])->name("deleteCourse");

    Route::post('/courses/{course}/submit', [CoursesController::class, 'submitCourse'])->name('submitCourse');
    Route::post('/recall-course/{id}', [CoursesController::class, 'recallCourse'])->name('recallCourse');
    // ----------------------------------course-details-------------------------
    Route::get('/my-course/{id}', [CoursesController::class, 'myCourse'])->name('my-course');
    Route::get("/course-list", [CoursesController::class, "list"])->name("course-lists");
    Route::get("/course-details/{id}", [CoursesController::class, "detail"])->name("course-details");
    Route::get("/course-checkout/{id}", [CoursesController::class, "checkout"])->name("course-checkout");
    Route::post("/checkout-submit", [CoursesController::class, "checkoutSubmit"])->name("checkout-submit");
    Route::get('/course-pricing/{id}', [CoursesController::class, 'pricing'])->name('course-pricing');
    Route::get('/chapter/{id}/{lesson_id?}', [CoursesController::class, 'lesson'])->name('lesson');
    Route::get('/courses/{course_id}/chapters/{chapter_id}/add-quiz', [CoursesController::class, 'addQuiz'])->name('courses.add-quiz');
    Route::post('/add-quiz', [CoursesController::class, 'store'])->name('courses.storequiz');
    Route::post('/storequiz', [CoursesController::class, 'store'])->name('courses.storequiz');
    Route::get('/list-quiz', [CoursesController::class, 'listquiz'])->name('list-quiz');
    Route::get('/quiz/{id}', [CoursesController::class, 'show'])->name('courses.show');
    Route::get('/quiz/{id}/edit', [CoursesController::class, 'editQuiz'])->name('courses.edit-quiz');
    Route::post('/quiz/{id}', [CoursesController::class, 'updateQuiz'])->name('courses.update-quiz');
    Route::delete('/quiz/{id}', [CoursesController::class, 'deleteQuiz'])->name('delete-quiz');
    Route::get('/quiz-chapter/{id}', [CoursesController::class, 'quizChapter'])->name('courses.quiz-chapter');
    Route::post('/quiz-chapter/{id}/submit', [CoursesController::class, 'submitQuiz'])->name('courses.submit');
    Route::get('/quiz-chapter/{id}/result/{score}', [CoursesController::class, 'quizResult'])->name('courses.quiz.result');
    Route::get('/header-categories', [HomeController::class, 'getCourseCategories'])->name('header.categories');
    //quiz final
    Route::get('/quiz-course/{course_id}', [QuizCourseController::class, 'index'])->name('client.quiz.quiz-final.index');
    Route::get('/quiz-course/{course_id}/create', [QuizCourseController::class, 'create'])->name('quiz-final.create');
    Route::get('/quizzes/{quiz_id}', [QuizCourseController::class, 'show'])->name('quiz.show-quiz-final');
    Route::post('/quiz-course/{course_id}', [QuizCourseController::class, 'store'])->name('quiz-final.store');
    Route::get('quiz/edit-final/{quiz_id}', [QuizCourseController::class, 'edit'])->name('quiz.edit-quiz-final');
    Route::put('quiz/update-final/{quiz_id}', [QuizCourseController::class, 'update'])->name('quiz.update-quiz-final');
    Route::delete('/quiz-course/quiz/{quiz_id}', [QuizCourseController::class, 'destroy'])->name('quiz-final.destroy');
    Route::get('/{quiz_id}/quiz', [QuizCourseController::class, 'quiz'])->name('quiz.quiz-final');
    Route::post('/{quiz_id}/submit', [QuizCourseController::class, 'submitQuiz'])->name('quiz.submit-quiz-final');
    Route::get('/quiz-result/{id}/{score}', [QuizCourseController::class, 'quizResult'])->name('quiz.quiz-result');
// suport mail
Route::get('/contact', [SupportController::class, 'contact'])->name('contact');
Route::post('/contact', [SupportController::class, 'submitSupportForm'])->name('contact.submit');

// thứ tự bài học
Route::post('/update-lesson-order', [CoursesController::class, 'updateOrder'])->name('lesson-order');
// thứ tự chương
Route::post('/chapter-order', [CoursesController::class, 'updateOrderChapter'])->name('chapter-order');
// thứ tự quiz chương
Route::post('/update-quiz-order', [CoursesController::class, 'updateQuizOrder'])->name('quiz-order');
//  thứ tự quiz final
Route::post('/quiz-final-order/{course_id}', [QuizCourseController::class, 'updateOrderQuizFinal'])->name('quiz-final-order');


    // ----------------------------- Search ------------------------------
    Route::get("/search", [SearchController::class, "search"])->name("search");

    // ----------------------------------CHECKOUT--------------------------
    Route::post("/checkout", [CheckoutController::class, "online_pay"])->name('checkout');
    Route::get("/thank", [CheckoutController::class, "thank"])->name("thank");

    // -----------------------Mentor-------------------------

    // -------------------------------resetPassword------------------------------

    Route::get("/reset-password", [PasswordController::class, "resetpassword"])->name("reset-password");
    Route::post('/reset-password', [PasswordController::class, 'handleResetpassword']);

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

Route::get('sale/add-sale', [SaleController::class, 'create'])->name('sale.add-sale');
Route::post('sale/store', [SaleController::class, 'store'])->name('sale.store');
Route::get('sale/show-sale', [SaleController::class, 'show'])->name('sale.show-sale');
Route::get('sale/{sale}/edit', [SaleController::class, 'edit'])->name('sale.edit');
Route::put('sale/{sale}', [SaleController::class, 'update'])->name('sale.update');
Route::delete('sale/{id}', [SaleController::class, 'destroy'])->name('sale.destroy');



Route::post('/apply-promotion', [SaleController::class, 'applyPromotion'])->name('apply.promotion');


Route::post('/video-progress', [CoursesController::class, 'saveProgress'])->middleware('auth');
Route::post('/video-progress-complete', [CoursesController::class, 'completeProgress'])->middleware('auth');
