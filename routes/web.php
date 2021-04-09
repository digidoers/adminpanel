<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
     

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware(['auth', 'is_admin'])->name('admin.')->prefix('admin')->namespace('Admin')->group(function(){

    //user Routes
    Route::get("/users/status/{user}","UserController@status")->name('users.status');
    Route::get("/","UserController@dashboard")->name('users.dashboard');
    Route::resource("/users","UserController");
   
    //Pages Routes
    Route::get("/pages/status/{page}","PageController@status")->name('pages.status');
    Route::resource("/pages","PageController");
    
    //Email-Template Routes
    Route::get("/emailtemplates/status/{emailtemplate}","EmailTemplateController@status")->name('emailtemplates.status');
    Route::resource("/emailtemplates","EmailTemplateController");
    
    //Website-Setting Routes
    Route::get("/website-settings","WebsiteSettingController@edit")->name('website-settings.edit');
    Route::put("/website-settings","WebsiteSettingController@update")->name('website-settings.update');

    //Update-Profile Routes
    Route::get("/update-profile", "AdminController@updateProfile")->name('update-profile.edit');
    Route::put("/update-profile", "AdminController@update")->name('update-profile.update');

    //Change-Password Routes
    Route::get("/change-password", "AdminController@changePassword")->name('change-password.edit');
    Route::post("/change-password", "AdminController@updatePassword")->name('change-password.update');
});

Route::name('admin.')->prefix('admin')->namespace('Admin')->group(function()
{

    // Admin Login
   Route::get('/login',"Auth\LoginController@showLoginForm")->name('login');
   Route::post('/login',"Auth\LoginController@login")->name('login');
   
   //  Reset Password
   Route::get('/password/reset', "Auth\ForgotPasswordController@showLinkRequestForm")->name('password.request');
   Route::post('/password/email', "Auth\ForgotPasswordController@sendResetLinkEmail")->name('password.email');
   Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
   Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

   // Admin Logout

   Route::post('logout', 'Auth\LoginController@logout')->name('logout');

   
  

});

