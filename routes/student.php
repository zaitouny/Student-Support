<?php

use App\Http\Controllers\MoveController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\RegisteredStudentController;
use App\Http\Controllers\Auth\StudentController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register student routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "student" middleware group. Make something great!
|
*/

Route::name('student.')->group(function () {

    Route::resource("move",MoveController::class);
    Route::get('home',[MoveController::class,'home'])->name('index');
    Route::get('about',[MoveController::class,'about'])->name('about');
    Route::get('edu',[MoveController::class,'edu'])->name('edu');
    Route::get('team',[MoveController::class,'team'])->name('team');
    Route::get('testimonial',[MoveController::class,'testimonial'])->name('testimonial');
    Route::get('contact',[MoveController::class,'contact'])->name('contact');
    Route::get('404',[MoveController::class,'e404'])->name('404');
    Route::get('courses',[MoveController::class,'courses'])->name('courses');
    Route::get('StudyPlan',[MoveController::class,'plan'])->name('plan');
    Route::get('save-subjects',[MoveController::class,'saveSubjects'])->name('savesubjects');
    Route::get('quiz',[MoveController::class,'quiz'])->name('quiz');
    Route::get('homework',[MoveController::class,'homework'])->name('homework');
    Route::get('studentinformation',[MoveController::class,'studentinformation'])->name('studentinformation');
    Route::get('/subjects-results', [MoveController::class, 'showSubjects'])->name('subjects.status');
    Route::post('/subjects/update', [MoveController::class, 'updateSubjects'])->name('subjects.updateStatus');
    
});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth:student')->name('student.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/student_auth.php';
