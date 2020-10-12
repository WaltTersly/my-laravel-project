<?php

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
Route::group(['middleware' => 'preventBackHistory'],function(){

Route::get('/', function () {
return view('welcome');
});


Auth::routes();

Route::middleware(['roles:Admin'])->group(function () {

    Route::get('/admin', [
        'uses' => 'AdminController@index',
        'as' => 'admin.dashboard',
        //'middleware' => 'roles',
        //'roles' => ['Admin']

    ]);

    Route::get('/admin/roles/assign', [
        //'middleware' => 'roles',
        'uses' => 'RolesController@index',
        'as' => 'admin.assign',
        //'roles' => ['Admin']
    ]);

    Route::post('/admin/roles/assign-roles', [
        'uses' => 'RolesController@AssignRoles',
        'as' => 'admin.assign',
        //'middleware' => 'roles',
        //'roles' => ['Admin']
    ]);






    //Route::resource('admin/posts', 'Admin\\PostsController');
    Route::get('/equipmentchart', 'Equipment\\EquipmentsController@EquipsCharts')->name('Equipmentscharts');
    Route::resource('/equipmentreport', 'EquipmentStateReportController');

    Route::resource('permisions', 'RolesController');
    Route::resource('membership/members', 'Membership\\MembersController');
    Route::resource('training/trainers', 'Training\\TrainersController');
    Route::resource('cashier/cashiers', 'Cashier\\CashiersController');
    Route::resource('equipment/equipments', 'Equipment\\EquipmentsController');
    route::resource('/admin', 'AdminController');

});

Route::middleware(['roles:trainer'])->group(function () {
    Route::get('/traineracc', [
        'uses' => 'TraineraccController@index',
        'as' => 'traineracc',
        //'middleware' => 'roles',
        //'roles' => ['Admin']

    ]);

    Route::resource('/training/trainers', 'Training\\TrainersController');
    Route::get('/profile', 'ProfileController@index');
});

Route::middleware(['roles:user'])->group(function () {
    Route::get('/memberacc', [
        'uses' => 'MemberaccController@index',
        'as' => 'memberacc',
        //'middleware' => 'roles',
        //'roles' => ['Admin']

    ]);
    Route::resource('membership/members', 'Membership\\MembersController');
    //Route::resource('/training/trainers', 'Training\\TrainersController');
    Route::get('/memberprofile', 'MemberprofileController@index');
    Route::get('/profilepicture', 'AvatarController@getProfileAvatar')->name('profileavatar');
    Route::post('/profilepicture', 'AvatarController@profilePictureUpload')->name('profileavatar');
    Route::get('changepassword', 'Auth\ChangePasswordController@index')->name('password.change');
    Route::post('changepassword', 'Auth\ChangePasswordController@updatePassword')->name("password.update");
    //Route::get('/memberprofile', 'MemberprofileController@updatePassword');
});


Route::middleware(['roles:cashier'])->group(function () {
    Route::get('/cashieracc', [
        'uses' => 'CashieraccController@index',
        'as' => 'cashieracc',
        //'middleware' => 'roles',
        //'roles' => ['Admin']

    ]);
    Route::resource('cashier/cashiers', 'Cashier\\CashiersController');
    //Route::resource('/training/trainers', 'Training\\TrainersController');
    Route::get('/cashierprofile', 'CashierprofileController@index');
    Route::get('/profilepicture', 'AvatarController@getProfileAvatar')->name('profileavatar');
    Route::post('/profilepicture', 'AvatarController@profilePictureUpload')->name('profileavatar');
    Route::get('changepassword', 'Auth\ChangePasswordController@index')->name('password.change');
    Route::post('changepassword', 'Auth\ChangePasswordController@updatePassword')->name("password.update");
});
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/profile', 'ProfileController@index');

Route::resource('trschedule/trainschedule', 'trschedule\\TrainscheduleController');
Route::resource('managers/manager', 'managers\\ManagerController');
Route::resource('cashier/cashiers', 'Cashier\\CashiersController');



// Route::resource('membership/members', 'Membership\\MembersController');
// Route::resource('training/trainers', 'Training\\TrainersController');
// Route::resource('cashier/cashiers', 'Cashier\\CashiersController');
// Route::resource('equipment/equipments', 'Equipment\\EquipmentsController');
// route::resource('/admin','AdminController');
});