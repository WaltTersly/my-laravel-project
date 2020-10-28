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

// Admin routes
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






    Route::resource('permisions', 'RolesController');
    Route::get('/equipmentchart', 'Equipment\\EquipmentsController@EquipsCharts')->name('Equipmentscharts');
    Route::resource('/equipmentreport', 'EquipmentStateReportController');
    Route::get('/memberchart', 'Membership\\MembersController@Memberschart');
    
    //Route::resource('membership/members', 'Membership\\MembersController');
    //Route::resource('training/trainers', 'Training\\TrainersController');
    //Route::resource('cashier/cashiers', 'Cashier\\CashiersController');
    Route::resource('equipment/equipments', 'Equipment\\EquipmentsController');
    Route::resource('managers/manager','managers\\ManagerController');
    

});

// Trainers routes
Route::middleware(['roles:trainer', 'auth'])->group(function () {
    Route::get('/traineracc', [
        'uses' => 'TraineraccController@index',
        'as' => 'traineracc',
        

    ]);

    Route::resource('/training/trainers', 'Training\\TrainersController');
    Route::get('/profile', 'ProfileController@index');
});

//Memebers rouutes
Route::middleware(['roles:user', 'auth'])->group(function () {
    Route::get('/memberacc', [
        'uses' => 'MemberaccController@index',
        'as' => 'memberacc',
        

    ]);
    
    
    Route::get('/memberprofile', 'MemberprofileController@index');
    Route::resource('membership/members', 'Membership\\MembersController');
    
    
});

//Cashiers routes
Route::middleware(['roles:cashier','auth'])->group(function () {
    Route::get('/cashieracc', [
        'uses' => 'CashieraccController@index',
        'as' => 'cashieracc',
        

    ]);
    Route::resource('cashier/cashiers', 'Cashier\\CashiersController');
    Route::get('/cashierprofile', 'CashierprofileController@index');
    
});



Route::get('/home', 'HomeController@index')->name('home');


// Route::resource('trschedule/trainschedule', 'trschedule\\TrainscheduleController');
// Route::resource('managers/manager', 'managers\\ManagerController');
// Route::resource('cashier/cashiers', 'Cashier\\CashiersController');


//shared routes by all
Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/changepassword',[
        'uses' => 'Auth\ChangePasswordController@index',
        'as' =>  'password.change',
        'roles' => ['Admin', 'trainer', 'user', 'cashier', 'manager']

    ]);
    Route::post('/changepassword',[
        'uses' => 'Auth\ChangePasswordController@updatepassword',
        'as' =>  'password.update',
        'roles' => ['Admin', 'trainer', 'user', 'cashier', 'manager']

    ]);
    Route::get('/profilepicture',[
        'uses' => 'AvatarController@getProfileAvatar',
        'as' =>  'profileavatar',
        'roles' => ['Admin', 'trainer', 'user', 'cashier', 'manager']

    ]);
    Route::post('/profilepicture',[
        'uses' => 'AvatarController@profilePictureUpload',
        'as' =>  'profileavatar',
        'roles' => ['Admin', 'trainer', 'user', 'cashier', 'manager']

    ]);

});

//Routes shared by admin and trainers and managers
Route::middleware(['roles:Admin', 'roles:trainer', 'roles:manager', 'auth'])->group(function () {
    Route::resource('/training/trainers','Training\\TrainersController');
    Route::resource('trschedule/trainschedule', 'trschedule\\TrainscheduleController');

});




//Route shared by admin and manager
Route::middleware(['roles:Admin', 'roles:manager', 'auth'])->group(function () {
    Route::resource('equipment/equipments', 'Equipment\\EquipmentsController');
    Route::resource('managers/manager','managers\\ManagerController');

});

});