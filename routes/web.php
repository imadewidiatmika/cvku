<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use App\Http\Controllers\CvController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Cv1Controller;
use App\Http\Controllers\ReviewController;

use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\AdminEducationController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminExperienceController;
use App\Http\Controllers\AdminInformationController;
use App\Http\Controllers\AdminCertificateController;
use App\Http\Controllers\AdminLanguageController;
use App\Http\Controllers\AdminOrganizationController;
use App\Http\Controllers\AdminSkillController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
});

Route::group(['middleware' => ['auth', 'is_admin:0']], function () {
    Route::get('/makecv', function () {
        return view('makecv');
    });
});

Route::group(['middleware' => ['auth', 'is_admin:1']], function () {
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.index');
    
    Route::get('/admin/certificate', [AdminCertificateController::class, 'index'])->name('admin.certificate');
    Route::delete('/admin/certificate/{certificate}', [AdminCertificateController::class, 'destroy'])->name('admin.certificate.destroy');

    Route::get('/admin/information', [AdminInformationController::class, 'index'])->name('admin.information');
    Route::delete('/admin/information/{information}', [AdminInformationController::class, 'destroy'])->name('admin.information.destroy');

    Route::get('/admin/educaiton', [AdminEducationController::class, 'index'])->name('admin.education');
    Route::delete('/admin/education/{education}', [AdminEducationController::class, 'destroy'])->name('admin.education.destroy');

    Route::get('/admin/organization', [AdminOrganizationController::class, 'index'])->name('admin.organization');
    Route::delete('/admin/organization/{organization}', [AdminOrganizationController::class, 'destroy'])->name('admin.organization.destroy');

    Route::get('/admin/skill', [AdminSkillController::class, 'index'])->name('admin.skill');
    Route::delete('/admin/skill/{skill}', [AdminSkillController::class, 'destroy'])->name('admin.skill.destroy');

    Route::get('/admin/language', [AdminLanguageController::class, 'index'])->name('admin.language');
    Route::delete('/admin/language/{language}', [AdminLanguageController::class, 'destroy'])->name('admin.language.destroy');

    Route::get('/admin/experience', [AdminExperienceController::class, 'index'])->name('admin.experience');
    Route::delete('/admin/experience/{experience}', [AdminExperienceController::class, 'destroy'])->name('admin.experience.destroy');

    Route::get('/admin/user', [AdminUserController::class, 'index'])->name('admin.user');
    Route::delete('/admin/user/{user}', [AdminUserController::class, 'destroy'])->name('admin.user.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.des\troy');
});

Route::group(['middleware' => ['auth', 'is_admin:0', 'verified']], function () {

    Route::resource('experience', ExperienceController::class);

    Route::resource('information', InformationController::class);

    Route::resource('education', EducationController::class);

    Route::resource('organization', OrganizationController::class);

    Route::resource('skill', SkillController::class);

    Route::resource('language', LanguageController::class);

    Route::resource('certificate', CertificateController::class);

    Route::get('/review', [ReviewController::class, 'index'])->name('review1.index');

    Route::get('/form/cv1', [Cv1Controller::class, 'index'])->name('cv1.index');
    Route::get('/form/cv1/download', [Cv1Controller::class, 'download'])->name('cv1.download');


});




Route::get('auth/google',[App\Http\Controllers\GoogleController::class,'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback',[App\Http\Controllers\GoogleController::class,'handleGoogleCallback'])->name('google.callback');

require __DIR__.'/auth.php';

Auth::routes(['verify' => true]);

