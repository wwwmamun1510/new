<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IntroductionController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PolitelyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class,'index'])->name('home');
Route::get('/', [FrontendController::class,'welcome']);
Route::get('/about', [FrontendController::class,'about']);
Route::get('/contact', [FrontendController::class,'contact']);
Route::post('/add/users', [HomeController::class,'add_users'])->name('add.users');
Route::get('/admin', [FrontendController::class, 'admin']);


//Testimonial
Route::get('/testimonial', [TestimonialController::class,'index']);
Route::post('add-testimonial',[TestimonialController::class,'store']);
Route::get('edit-testimonial/{id}',[TestimonialController::class,'edit']);
Route::put('update-testimonial/{id}', [TestimonialController::class,'update']);
Route::delete('delete-testimonial/{id}', [TestimonialController::class,'delete']);

//Logo
Route::get('/logo',[LogoController::class,'index']);
Route::post('add-logo',[LogoController::class,'store']);
Route::get('edit-logo/{id}',[LogoController::class,'edit']);
Route::put('update-logo/{id}', [LogoController::class,'update']);
Route::delete('delete-logo/{id}', [LogoController::class,'delete']);


//Introduction
Route::get('/introduction',[IntroductionController::class,'index']);
Route::post('add-introduction',[IntroductionController::class,'store']);
Route::get('edit-introduction/{id}',[IntroductionController::class,'edit']);
Route::put('update-introduction/{id}', [IntroductionController::class,'update']);
Route::delete('delete-introduction/{id}', [IntroductionController::class,'delete']);


//Experience
Route::get('/experience',[ExperienceController::class,'index']);
Route::post('add-experience',[ExperienceController::class,'store']);
Route::get('edit-experience/{id}',[ExperienceController::class,'edit']);
Route::put('update-experience/{id}', [ExperienceController::class,'update']);
Route::delete('delete-experience/{id}', [ExperienceController::class,'delete']);

//Project
Route::get('/project',[ProjectController::class,'index']);
Route::post('add-project',[ProjectController::class,'store']);
Route::get('edit-project/{id}',[ProjectController::class,'edit']);
Route::put('update-project/{id}', [ProjectController::class,'update']);
Route::delete('delete-project/{id}', [ProjectController::class,'delete']);

//Sponsor
Route::get('/sponsor',[SponsorController::class,'index']);
Route::post('add-sponsor',[SponsorController::class,'store']);
Route::get('edit-sponsor/{id}',[SponsorController::class,'edit']);
Route::put('update-sponsor/{id}', [SponsorController::class,'update']);
Route::delete('delete-sponsor/{id}', [SponsorController::class,'delete']);

//News
Route::get('/news',[NewsController::class,'index']);
Route::post('add-news',[NewsController::class,'store']);
Route::get('edit-news/{id}',[NewsController::class,'edit']);
Route::put('update-news/{id}', [NewsController::class,'update']);
Route::delete('delete-news/{id}', [NewsController::class,'delete']);

//Front
Route::get('/front',[FrontController::class,'index']);
Route::post('add-front',[FrontController::class,'store']);
Route::get('edit-front/{id}',[FrontController::class,'edit']);
Route::put('update-front/{id}', [FrontController::class,'update']);
Route::delete('delete-front/{id}', [FrontController::class,'delete']);

//Skill
Route::get('/skill',[SkillController::class,'index']);
Route::post('add-skill',[SkillController::class,'store']);
Route::get('edit-skill/{id}',[SkillController::class,'edit']);
Route::put('update-skill/{id}', [SkillController::class,'update']);
Route::delete('delete-skill/{id}', [SkillController::class,'delete']);

//Banner
Route::get('/banner',[BannerController::class,'index']);
Route::post('add-banner',[BannerController::class,'store']);
Route::get('edit-banner/{id}',[BannerController::class,'edit']);
Route::put('update-banner/{id}', [BannerController::class,'update']);
Route::get('change-status/{id}', [BannerController::class,'change_status']);
Route::delete('delete-banner/{id}', [BannerController::class,'delete']);


//Contact
Route::get('/contact',[ContactController::class,'index']);
Route::post('add-contact',[ContactController::class,'store']);
Route::get('edit-contact/{id}',[ContactController::class,'edit']);
Route::put('update-contact/{id}', [ContactController::class,'update']);
Route::delete('delete-contact/{id}', [ContactController::class,'delete']);

//Social
Route::get('/social',[SocialController::class,'index']);
Route::post('add-social',[SocialController::class,'store']);
Route::get('edit-social/{id}',[SocialController::class,'edit']);
Route::put('update-social/{id}', [SocialController::class,'update']);
Route::delete('delete-social/{id}', [SocialController::class,'delete']);

//Brand
Route::get('/brand',[BrandController::class,'index']);
Route::post('add-brand',[BrandController::class,'store']);
Route::get('edit-brand/{id}',[BrandController::class,'edit']);
Route::put('update-brand/{id}', [BrandController::class,'update']);
Route::delete('delete-brand/{id}', [BrandController::class,'delete']);

//Politely
Route::get('/politely',[PolitelyController::class,'index']);
Route::post('add-politely',[PolitelyController::class,'store']);
Route::get('edit-politely/{id}',[PolitelyController::class,'edit']);
Route::put('update-politely/{id}', [PolitelyController::class,'update']);
Route::delete('delete-politely/{id}', [PolitelyController::class,'delete']);

//profile
Route::get('/profile/edit', [ProfileController::class, 'profile']);
Route::post('/profile/update', [ProfileController::class, 'update']);
Route::post('/password/update', [ProfileController::class, 'pass_update']);
Route::post('/photo/change', [ProfileController::class, 'photo_edit']);