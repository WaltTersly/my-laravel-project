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

Route::middleware(['roles:Admin', 'auth'])->group(function () {

    Route::get('/admin', [
        'uses' => 'AdminController@index',
        'as' => 'admin.dashboard',
       

    ]);

    Route::get('/admin/roles/assign', [
        'uses' => 'RolesController@index',
        'as' => 'admin.assign',
    ]);

    Route::post('/admin/roles/assign-roles', [
        'uses' => 'RolesController@AssignRoles',
        'as' => 'admin.assign',
        
    ]);






    //Route::resource('admin/posts', 'Admin\\PostsController');
    Route::get('/equipmentchart', 'Equipment\\EquipmentsController@EquipsCharts')->name('Equipmentscharts');
    Route::resource('/equipmentreport', 'EquipmentStateReportController');

    Route::resource('permisions', 'RolesController');
    Route::resource('membership/members', 'Membership\\MembersController');
    Route::resource('training/trainers', 'Training\\TrainersController');
    Route::resource('cashier/cashiers', 'Cashier\\CashiersController');
    Route::resource('equipment/equipments', 'Equipment\\EquipmentsController');
    //route::resource('/admin', 'AdminController');

});

Route::middleware(['roles:trainer', 'auth'])->group(function () {
    Route::get('/traineracc', [
        'uses' => 'TraineraccController@index',
        'as' => 'traineracc',
        

    ]);

    Route::resource('/training/trainers', 'Training\\TrainersController');
    Route::get('/profile', 'ProfileController@index');
});

Route::middleware(['roles:user', 'auth'])->group(function () {
    Route::get('/memberacc', [
        'uses' => 'MemberaccController@index',
        'as' => 'memberacc',
        

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


Route::middleware(['roles:cashier','auth'])->group(function () {
    Route::get('/cashieracc', [
        'uses' => 'CashieraccController@index',
        'as' => 'cashieracc',
        

    ]);
    Route::resource('cashier/cashiers', 'Cashier\\CashiersController');
    //Route::resource('/training/trainers', 'Training\\TrainersController');
    Route::get('/cashierprofile', 'CashierprofileController@index');
    Route::get('/profilepicture', 'AvatarController@getProfileAvatar')->name('profileavatar');
    Route::post('/profilepicture', 'AvatarController@profilePictureUpload')->name('profileavatar');
    Route::get('changepassword', 'Auth\ChangePasswordController@index')->name('password.change');
    Route::post('changepassword', 'Auth\ChangePasswordController@updatePassword')->name("password.update");
});

// Route::middleware(['roles:manager','auth'])->group(function () {
//     Route::get('/cashieracc', [
//         'uses' => 'CashieraccController@index',
//         'as' => 'cashieracc',
        

//     ]);
//     Route::resource('cashier/cashiers', 'Cashier\\CashiersController');
//     //Route::resource('/training/trainers', 'Training\\TrainersController');
//     Route::get('/cashierprofile', 'CashierprofileController@index');
//     Route::get('/profilepicture', 'AvatarController@getProfileAvatar')->name('profileavatar');
//     Route::post('/profilepicture', 'AvatarController@profilePictureUpload')->name('profileavatar');
//     Route::get('changepassword', 'Auth\ChangePasswordController@index')->name('password.change');
//     Route::post('changepassword', 'Auth\ChangePasswordController@updatePassword')->name("password.update");
// });

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/profile', 'ProfileController@index');

Route::resource('trschedule/trainschedule', 'trschedule\\TrainscheduleController');
Route::resource('managers/manager', 'managers\\ManagerController');
Route::resource('cashier/cashiers', 'Cashier\\CashiersController');
Route::get('changepassword', 'Auth\ChangePasswordController@index')->name('password.change');
Route::post('changepassword', 'Auth\ChangePasswordController@updatePassword')->name("password.update");
Route::get('/profilepicture', 'AvatarController@getProfileAvatar')->name('profileavatar');
Route::post('/profilepicture', 'AvatarController@profilePictureUpload')->name('profileavatar');



// Route::resource('membership/members', 'Membership\\MembersController');
// Route::resource('training/trainers', 'Training\\TrainersController');
// Route::resource('cashier/cashiers', 'Cashier\\CashiersController');
// Route::resource('equipment/equipments', 'Equipment\\EquipmentsController');
// route::resource('/admin','AdminController');
});