<?php

use App\Http\Controllers\API\TranslationsAPIController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Modules\Dashboard\DashboardsController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Auth\ResetPasswordController;
use App\Http\Controllers\Backend\Auth\ConfirmPasswordController;
use App\Http\Controllers\Backend\Auth\VerificationController;
use App\Http\Controllers\Backend\Auth\ForgotPasswordController;
use App\Http\Controllers\Backend\Modules\Advertisement\AdvertisementsController;
use App\Http\Controllers\Backend\Modules\Admin\AdminsController;
use App\Http\Controllers\Backend\Modules\Admin\RolesController;
use App\Http\Controllers\Backend\Modules\Settings\PagesController as SettingsPagesController;
use App\Http\Controllers\Backend\Modules\Category\CategoriesController;
use App\Http\Controllers\Backend\Modules\Blog\BlogsController;
use App\Http\Controllers\Backend\Modules\Page\PagesController;
use App\Http\Controllers\Backend\Modules\Word\WordsController;
use App\Http\Controllers\Backend\Modules\Sentence\SentencesController;
use App\Http\Controllers\Backend\Modules\Settings\LanguagesController;
use App\Http\Controllers\Backend\Modules\Translation\TranslationsController;
use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\LanguagePageController;
use App\Http\Controllers\Frontend\CategoryPageController;
use App\Http\Controllers\Frontend\FrontPagesController;
use Illuminate\Support\Facades\App;

// use Illuminate\Support\Facades\Session;

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

/*route for language*/
Route::get('locale/{locale}', function($locale){
    Session::put('locale',$locale);
	return redirect()->back();
});


/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Admin Panel Route List
|
*/

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    // Auth::routes();

    Route::get('/', [DashboardsController::class, 'index'])->name('index');

    // Login Routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login/submit', [LoginController::class, 'login'])->name('login.submit');
    Route::post('/logout/submit', [LoginController::class, 'logout'])->name('logout');

    // Reset Password Routes
    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

    /**
     * Admin Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('admins', AdminsController::class);
        Route::get('admins/trashed/view', [AdminsController::class, 'trashed'])->name('admins.trashed');
        Route::get('profile/edit', [AdminsController::class, 'editProfile'])->name('admins.profile.edit');
        Route::put('profile/update', [AdminsController::class, 'updateProfile'])->name('admins.profile.update');
        Route::delete('admins/trashed/destroy/{id}', [AdminsController::class, 'destroyTrash'])->name('admins.trashed.destroy');
        Route::put('admins/trashed/revert/{id}', [AdminsController::class, 'revertFromTrash'])->name('admins.trashed.revert');
    });

    /**
     * Role & Permission Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('roles', RolesController::class);
    });


    /**
     * Category Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('categories', CategoriesController::class);
        Route::get('categories/trashed/view', [CategoriesController::class, 'trashed'])->name('categories.trashed');
        Route::delete('categories/trashed/destroy/{id}', [CategoriesController::class, 'destroyTrash'])->name('categories.trashed.destroy');
        Route::put('categories/trashed/revert/{id}', [CategoriesController::class, 'revertFromTrash'])->name('categories.trashed.revert');
    });

    /**
     * Page Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('pages', PagesController::class);
        Route::get('pages/trashed/view', [PagesController::class, 'trashed'])->name('pages.trashed');
        Route::delete('pages/trashed/destroy/{id}', [PagesController::class, 'destroyTrash'])->name('pages.trashed.destroy');
        Route::put('pages/trashed/revert/{id}', [PagesController::class, 'revertFromTrash'])->name('pages.trashed.revert');
    });

    /**
     * Word Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('words', WordsController::class);
        Route::get('words/trashed/view', [WordsController::class, 'trashed'])->name('words.trashed');
        Route::delete('words/trashed/destroy/{id}', [WordsController::class, 'destroyTrash'])->name('words.trashed.destroy');
        Route::put('words/trashed/revert/{id}', [WordsController::class, 'revertFromTrash'])->name('words.trashed.revert');
    });

    /**
     * Sentence Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('sentences', SentencesController::class);
        Route::get('sentences/trashed/view', [SentencesController::class, 'trashed'])->name('sentences.trashed');
        Route::delete('sentences/trashed/destroy/{id}', [SentencesController::class, 'destroyTrash'])->name('sentences.trashed.destroy');
        Route::put('sentences/trashed/revert/{id}', [SentencesController::class, 'revertFromTrash'])->name('sentences.trashed.revert');
    });

    /**
     * Blog Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('blogs', BlogsController::class);
        Route::get('blogs/trashed/view', [BlogsController::class, 'trashed'])->name('blogs.trashed');
        Route::delete('blogs/trashed/destroy/{id}', [BlogsController::class, 'destroyTrash'])->name('blogs.trashed.destroy');
        Route::put('blogs/trashed/revert/{id}', [BlogsController::class, 'revertFromTrash'])->name('blogs.trashed.revert');
    });

     /**
     * Advertisement Management Routes
     */
    Route::group(['prefix' => ''], function () {
        Route::resource('advertisements', AdvertisementsController::class);
        Route::get('advertisements/trashed/view', [AdvertisementsController::class, 'trashed'])->name('advertisements.trashed');
        Route::delete('advertisements/trashed/destroy/{id}', [AdvertisementsController::class, 'destroyTrash'])->name('advertisements.trashed.destroy');
        Route::put('advertisements/trashed/revert/{id}', [AdvertisementsController::class, 'revertFromTrash'])->name('advertisements.trashed.revert');
    });

    /**
     * Translation Management Routes
     */
    Route::group(['prefix' => 'translations'], function () {
        Route::get('create', [TranslationsController::class, 'create'])->name('translations.create');
        Route::post('store', [TranslationsController::class, 'store'])->name('translations.store');
    });

    /**
     * Settings Management Routes
     */
    Route::group(['prefix' => 'settings'], function () {
        Route::resource('languages', LanguagesController::class);
    });

});

Auth::routes();

/*
|--------------------------------------------------------------------------
| Frontend Routes - API
|--------------------------------------------------------------------------
|
| Fontend API Route List
|
*/
Route::group(['prefix' => 'api', 'as' => 'api.'], function () {
    Route::get('get-data-by-chapter', [TranslationsAPIController::class, 'getTranslationDataByChapter'])->name('translations.get_data');
});




/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
| Fontend Website Route List
|
*/

Route::get( '/', [ HomePageController::class, 'index' ] )->name( 'index' );
Route::get( '/services', [ FrontPagesController::class, 'servicePage' ] )->name( 'pages.service' );
Route::get( '/about-us', [ FrontPagesController::class, 'aboutPage' ] )->name( 'pages.about' );
Route::get( '/price', [ FrontPagesController::class, 'pricePage' ] )->name( 'pages.price' );
Route::get( '/online', [ FrontPagesController::class, 'onlinePage' ] )->name( 'pages.online' );
Route::get( '/offer', [ FrontPagesController::class, 'offerPage' ] )->name( 'pages.offer' );
Route::get( '/contact', [ FrontPagesController::class, 'contactPage' ] )->name( 'pages.contact' );
