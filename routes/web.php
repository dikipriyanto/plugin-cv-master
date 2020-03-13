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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('add-user',function(){
//     \DB::table('users')->insert([
//         'name'=>'admin',
//         'email'=>'admin@mail.com',
//         'password'=>bcrypt('123456'),
//         'created_at'=>date('Y-m-d H:i:s'),
//         'updated_at'=>date('Y-m-d H:i:s')
//     ]);
//     dd('User berhasil Ditambah');
// });

Route::group(['middleware'=>'auth'],function(){
    Route::get('/admin','Admin\Beranda_controller@index');
});

Auth::routes();

Route::get('/home', function(){
    return redirect('admin');
});

Route::group(['middleware'=>'auth'],function(){
 
    // Beranda Admin
    Route::get('/admin','Admin\Beranda_controller@index');
 
    // Management Profile
    Route::get('/admin/profile','Admin\Profile_controller@index');
    Route::put('/admin/profile/{id}','Admin\Profile_controller@update');

    // foto
    Route::get('/admin/photo','Admin\Photo_controller@index');
    Route::post('/admin/photo','Admin\Photo_controller@store')->name('photo.store');


    //Route Terbaru Tim
    Route::resource('/tim', 'TimController')->middleware('auth');
    Route::resource('/Clients', 'ClientController')->middleware('auth');
    Route::resource('/product', 'ProductController')->middleware('auth');

    Route::resource('projek', 'ProjekController');
    
});
