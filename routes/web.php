update all routes and 
Update frontend/FrontendController.php to make sure it corresponds to this below 

Making sure all pages are session auth protected 

<?php

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\LanguageController;
use App\Livewire\Privacy;
use App\Livewire\Terms;
use Illuminate\Support\Facades\Route;

/*
*
* Auth Routes
*
* --------------------------------------------------------------------
*/

require __DIR__.'/auth.php';

/*
*
* Frontend Routes
*
* --------------------------------------------------------------------
*/

// home route
Route::get('home', [FrontendController::class, 'index'])->name('home');

// Language Switch
Route::get('language/{language}', [LanguageController::class, 'switch'])->name('language.switch');

Route::get('dashboard', 'App\Http\Controllers\Frontend\FrontendController@index')->name('dashboard');

// pages
Route::get('terms', Terms::class)->name('terms');
Route::get('privacy', Privacy::class)->name('privacy');

Route::group(['namespace' => 'App\Http\Controllers\Frontend', 'as' => 'frontend.'], function () {
    Route::get('/', 'FrontendController@index')->name('index');

    Route::group(['middleware' => ['auth']], function () {
        /*
        *
        *  Users Routes
        *
        * ---------------------------------------------------------------------
        */
        $market_name = 'users';
        $controller_name = 'UserController';
        Route::get('profile/edit', ['as' => "{$market_name}.profileEdit", 'uses' => "{$controller_name}@profileEdit"]);
        Route::patch('profile/edit', ['as' => "{$market_name}.profileUpdate", 'uses' => "{$controller_name}@profileUpdate"]);
        Route::get('profile/changePassword', ['as' => "{$market_name}.changePassword", 'uses' => "{$controller_name}@changePassword"]);
        Route::patch('profile/changePassword', ['as' => "{$market_name}.changePasswordUpdate", 'uses' => "{$controller_name}@changePasswordUpdate"]);
        Route::get('profile/{username?}', ['as' => "{$market_name}.profile", 'uses' => "{$controller_name}@profile"]);
        Route::get("{$market_name}/emailConfirmationResend", ['as' => "{$market_name}.emailConfirmationResend", 'uses' => "{$controller_name}@emailConfirmationResend"]);
        Route::delete("{$market_name}/userProviderDestroy", ['as' => "{$market_name}.userProviderDestroy", 'uses' => "{$controller_name}@userProviderDestroy"]);
    });
});

/*
*
* Backend Routes
* These routes need view-backend permission
* --------------------------------------------------------------------
*/
Route::group(['namespace' => 'App\Http\Controllers\Backend', 'prefix' => 'admin', 'as' => 'backend.', 'middleware' => ['auth', 'can:view_backend']], function () {
    /**
     * Backend Dashboard
     * Namespaces indicate folder structure.
     */
    Route::get('/', 'BackendController@index')->name('home');
    Route::get('dashboard', 'BackendController@index')->name('dashboard');

    /*
     *
     *  Settings Routes
     *
     * ---------------------------------------------------------------------
     */
    Route::group(['middleware' => ['can:edit_settings']], function () {
        $market_name = 'settings';
        $controller_name = 'SettingController';
        Route::get("{$market_name}", "{$controller_name}@index")->name("{$market_name}");
        Route::post("{$market_name}", "{$controller_name}@store")->name("{$market_name}.store");
    });

    /*
    *
    *  Notification Routes
    *
    * ---------------------------------------------------------------------
    */
    $market_name = 'notifications';
    $controller_name = 'NotificationsController';
    Route::get("{$market_name}", ['as' => "{$market_name}.index", 'uses' => "{$controller_name}@index"]);
    Route::get("{$market_name}/markAllAsRead", ['as' => "{$market_name}.markAllAsRead", 'uses' => "{$controller_name}@markAllAsRead"]);
    Route::delete("{$market_name}/deleteAll", ['as' => "{$market_name}.deleteAll", 'uses' => "{$controller_name}@deleteAll"]);
    Route::get("{$market_name}/{id}", ['as' => "{$market_name}.show", 'uses' => "{$controller_name}@show"]);

    /*
    *
    *  Backup Routes
    *
    * ---------------------------------------------------------------------
    */
    $market_name = 'backups';
    $controller_name = 'BackupController';
    Route::get("{$market_name}", ['as' => "{$market_name}.index", 'uses' => "{$controller_name}@index"]);
    Route::get("{$market_name}/create", ['as' => "{$market_name}.create", 'uses' => "{$controller_name}@create"]);
    Route::get("{$market_name}/download/{file_name}", ['as' => "{$market_name}.download", 'uses' => "{$controller_name}@download"]);
    Route::get("{$market_name}/delete/{file_name}", ['as' => "{$market_name}.delete", 'uses' => "{$controller_name}@delete"]);

    /*
    *
    *  Roles Routes
    *
    * ---------------------------------------------------------------------
    */
    $market_name = 'roles';
    $controller_name = 'RolesController';
    Route::resource("{$market_name}", "{$controller_name}");

    /*
    *
    *  Users Routes
    *
    * ---------------------------------------------------------------------
    */
    $market_name = 'users';
    $controller_name = 'UserController';
    Route::get("{$market_name}/{id}/resend-email-confirmation", ['as' => "{$market_name}.emailConfirmationResend", 'uses' => "{$controller_name}@emailConfirmationResend"]);
    Route::delete("{$market_name}/user-provider-destroy", ['as' => "{$market_name}.userProviderDestroy", 'uses' => "{$controller_name}@userProviderDestroy"]);
    Route::get("{$market_name}/{id}/change-password", ['as' => "{$market_name}.changePassword", 'uses' => "{$controller_name}@changePassword"]);
    Route::patch("{$market_name}/{id}/change-password", ['as' => "{$market_name}.changePasswordUpdate", 'uses' => "{$controller_name}@changePasswordUpdate"]);
    Route::get("{$market_name}/trashed", ['as' => "{$market_name}.trashed", 'uses' => "{$controller_name}@trashed"]);
    Route::patch("{$market_name}/{id}/trashed", ['as' => "{$market_name}.restore", 'uses' => "{$controller_name}@restore"]);
    Route::get("{$market_name}/index_data", ['as' => "{$market_name}.index_data", 'uses' => "{$controller_name}@index_data"]);
    Route::get("{$market_name}/index_list", ['as' => "{$market_name}.index_list", 'uses' => "{$controller_name}@index_list"]);
    Route::patch("{$market_name}/{id}/block", ['as' => "{$market_name}.block", 'uses' => "{$controller_name}@block", 'middleware' => ['can:block_users']]);
    Route::patch("{$market_name}/{id}/unblock", ['as' => "{$market_name}.unblock", 'uses' => "{$controller_name}@unblock", 'middleware' => ['can:block_users']]);
    Route::resource("{$market_name}", "{$controller_name}");
});

/**
 * File Manager Routes.
 */
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth', 'can:view_backend']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Continue from here integrate 
touch resources/views/index.blade.php
touch resources/views/accounts/index.blade.php
touch resources/views/banks/index.blade.php
touch resources/views/cpanels/index.blade.php
touch resources/views/mailers/index.blade.php
touch resources/views/purchases/index.blade.php
touch resources/views/scampages/index.blade.php
touch resources/views/smtps/index.blade.php
touch resources/views/shell/index.blade.php
touch resources/views/ticket/index.blade.php
touch resources/views/tutorials/index.blade.php
