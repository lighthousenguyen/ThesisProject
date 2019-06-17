<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Http\Middleware\UploadingFile;
use VMN\UploadService\Uploader;
use App\Http\Middleware\LoginRequired;
use App\Http\Middleware\ProfileMiddleWare;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


//Route::group(['domain' => 'admin.vmn.local', 'middleware' => ['web']], function () {
Route::group(['domain' => 'admin.vmn.vnvalley.com', 'middleware' => ['web']],function () {
    Route::get('/', function(){
       return redirect('managementLogin');
    });

    Route::get('/managementLogin', ['uses' => 'Auth\LoginController@showManagementLogin'])->name('managementLogin');

    Route::get('/managementLogout', ['uses' => 'Auth\LoginController@doManagementLogout'])->name('managementLogout');

    Route::post('/managementLogin', ['uses' => 'Auth\LoginController@doManagementLogin']);

    Route::get('/adminDashboard', ['uses' => 'Admin\AdminUsersDataController@adminHome'])->name('adminHome');

    Route::get('/waitingStore', ['uses' => 'Admin\AdminUsersDataController@adminGetApprove'])->name('admin.waitingStore');

    Route::get('/allUsers', ['uses' => 'Admin\AdminUsersDataController@adminAllUsers'])->name('admin.all-user');

    Route::get('/storeInfo', ['uses' => 'Admin\AdminUsersDataController@adminStoreInfo'])->name('admin.storeInfo');

    Route::put('/approveRegister', ['uses' => 'Admin\AdminProceedController@approveRegister'])->name('admin.proceedRegister');

    Route::put('/changeStatus', ['uses' => 'Admin\AdminProceedController@changeStatus'])->name('admin.changeStatus');

    Route::put('/changeRole', ['uses' => 'Admin\AdminProceedController@changeRole'])->name('admin.changeRole');

    Route::post('/createMod', ['uses' => 'Auth\RegisterController@memberRegister'])->name('admin.createMod');

    Route::get('/userDetail', ['uses' => 'Admin\AdminUsersDataController@adminUserDetail'])->name('admin.userDetail');

    Route::get('/modDashboard', ['uses' => 'Mod\ModArticleDataFindingController@modHome'])->name('modHome');

    Route::get('/plantManagement', ['uses' => 'Mod\ModArticleDataFindingController@getWaitingPlants'])->name('plantManagement');

    Route::get('/remedyManagement', ['uses' => 'Mod\ModArticleDataFindingController@getWaitingRemedies'])->name('remedyManagement');

    Route::put('/approveNewPlant', ['uses' => 'Mod\ModProceedController@approveNewPlant'])->name('mod.approveNewPlant');

    Route::put('/approveEditPlant', ['uses' => 'Mod\ModProceedController@approveEditedPlant'])->name('mod.approveEditedPlant');

    Route::put('/denyPlant', ['uses' => 'Mod\ModProceedController@denyPlant'])->name('mod.denyNewPlant');

    Route::put('/approveNewRemedy', ['uses' => 'Mod\ModProceedController@approveNewRemedy'])->name('mod.approveNewRemedy');

    Route::put('/approveEditRemedy', ['uses' => 'Mod\ModProceedController@approveEditRemedy'])->name('mod.approveEditRemedy');

    Route::put('/rejectRemedy', ['uses' => 'Mod\ModProceedController@rejectRemedy'])->name('mod.rejectRemedy');

    Route::post('/remindPlantAuthor', ['uses' => 'Mod\ModProceedController@remindPlantAuthor'])->name('mod.remindPlantAuthor');

    Route::post('/remindRemedyAuthor', ['uses' => 'Mod\ModProceedController@remindRemedyAuthor'])->name('mod.remindRemedyAuthor');

});

Route::group(['middleware' => ['web']], function () {

    Route::get('/', ['uses'=>'Article\PageShowingController@home'])->name('home');

    Route::get('/medicinalPlants', [
        'uses' => 'Article\ArticleFindingController@findPlants',
    ])->name('medicinal-plant');

    Route::get('/advanceSearchPlant', [
        'middleware' => LoginRequired::class,
        'uses'=>'Article\ArticleFindingController@showAdvanceSearchPlant'
    ])->name('advanced-search-plant');

    Route::get('/searchStore', [
        'middleware' => LoginRequired::class,
        'uses'=>'Auth\HerbalMedicineStoreController@search'
    ])->name('search-store');

    Route::get('/plantDetail', [
        'uses' => 'Article\ArticleFindingController@medicinalPlantsDetail'
    ])->name('plant-detail');

    Route::get('/addPlant', [
        'middleware' => LoginRequired::class,
        'uses'=>'Article\PageShowingController@showAddPlant'
    ])->name('add-plant');

    Route::get('/editPlant', [

        'uses'=>'Article\PageShowingController@showEditPlant'
    ])->name('edit-plant');

    Route::get('/remedies',[
        'uses' => 'Article\ArticleFindingController@findRemedies',
    ])->name('remedies');

    Route::get('/detailRemedy',[
        'uses' => 'Article\ArticleFindingController@detailRemedy',
    ])->name('remedy-detail');

    Route::get('/advanceSearchRemedy', [
        'middleware' => LoginRequired::class,
        'uses'=>'Article\ArticleFindingController@showAdvanceSearchRemedy'
    ])->name('advanced-search-remedy');

    Route::get('/addRemedy', [
        'middleware' => LoginRequired::class,
        'uses'=>'Article\PageShowingController@showAddRemedy'
    ])->name('add-remedy');

    Route::get('/editRemedy', ['uses'=>'Article\PageShowingController@showEditRemedy'])->name('edit-remedy');

    Route::get('/login', ['uses'=>'Auth\LoginController@showLogin'])->name('login');

    Route::get('/logout', ['uses'=>'Auth\LoginController@doLogout'])->name('logout');

    Route::get('/profile/{account}', ['uses' => 'Auth\ProfileController@showMemberProfile'])->name('profile');

    Route::get('/register', function () {
        return view('register');
    })->name('register');

    Route::get('/registerStore', function () {
        return view('storeRegister');
    })->name('register-store');

    Route::get('/regisStore', function () {
        return view('regisStore');
    })->name('regisStore');

    Route::put('/registerPrescription', [
        'middleware' => LoginRequired::class,
        'uses'=>'Auth\PrescriptionRegisteringController@register'
    ])->name('registerPrescription');

    Route::put('/removePrescription', [
        'middleware' => LoginRequired::class,
        'uses'=>'Auth\PrescriptionRegisteringController@remove'
    ])->name('removePrescription');

    Route::post('/login', ['uses'=>'Auth\LoginController@doLogin'])->name('auth.login');

    Route::post('/memberRegister',
        ['uses' => 'Auth\RegisterController@memberRegister'])
        ->name('auth.register');

    Route::post('/storeRegister', ['uses' => 'Auth\RegisterController@storeRegister'])
        ->name('auth.storeRegister');

    Route::post('/changePassword', ['uses' => 'Auth\PasswordController@changePassword'])
        ->name('changePassword');

    Route::post('/updateProfile', [
        'middleware' => ProfileMiddleWare::class,
        'uses' => 'Auth\ProfileController@updateProfile'])
        ->name('updateProfile');

    Route::post('/contributePlants',[
        'middleware' => LoginRequired::class,
        'uses'=>'Article\ArticleEditingController@addPlants'])
    ->name('contribute-plant');

    Route::post('/updatePlants',['uses'=>'Article\ArticleEditingController@editPlants'])
        ->name('update-plant');

    Route::post('/updateRemedy',['uses'=>'Article\ArticleEditingController@editRemedy'])
        ->name('update-plant');

    Route::post('/contributeRemedy', ['uses'=>'Article\ArticleEditingController@addRemedy'])
        ->name('contribute-remedy');


    Route::post('/review', [
        'middleware' => LoginRequired::class,
        'uses' => 'Article\ArticleReviewingController@reviewPlants'])
    ->name('postReview');

    Route::post('/ratingPlant', [
       'uses'  => 'Article\ArticleReviewingController@ratingPlant'
    ]);

    Route::post('/ratingRemedy', [
        'uses'  => 'Article\ArticleReviewingController@ratingRemedy'
    ]);

    Route::post('/reviewRemedy', [
        'middleware' => LoginRequired::class,
        'uses' => 'Article\ArticleReviewingController@reviewRemedy'])
        ->name('postReviewRemedy');

    Route::post('/reportPlant', [
        'middleware' => LoginRequired::class,
        'uses' => 'Article\ArticleReportingController@reportPlant'])
        ->name('postReport');

    Route::post('/reportRemedy', [
        'middleware' => LoginRequired::class,
        'uses' => 'Article\ArticleReportingController@reportRemedy'])
        ->name('postReport');



    Route::post('/upload', ['middleware' => [UploadingFile::class, LoginRequired::class], function (Uploader $uploader)
    {
        return response()->json([
            'file' => $uploader->upload(request()->file('file'))
        ], 200, [], JSON_UNESCAPED_SLASHES);
    }]);

});



