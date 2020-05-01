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

/*Route::get('/', function () {
    return view('pages.index');
});*/
Route::get('/','HelloController@IndexMethod');



Route::get('/contactus','HelloController@ContactMethod')->name('contact');
Route::get('/aboutus','HelloController@AboutMethod')->name('about');


//category routes
Route::get('/add/category','HeyController@AddCategoryMethod')->name('add.category');

Route::post('/store/category','HeyController@StoreCategoryMethod')->name('store.category');
Route::get('/all/category','HeyController@AllCategoryMethod')->name('all.category');
Route::get('view/category/{id}','HeyController@ViewCategoryMethod');
Route::get('delete/category/{id}','HeyController@DeleteCategoryMethod');
Route::get('edit/category/{id}','HeyController@EditCategoryMethod');
Route::post('update/category/{id}','HeyController@UpdateCategoryMethod');


//Post CRUD route are here
Route::get('/write/post','PostController@WritePostMethod')->name('write.post');
Route::post('/store/post','PostController@StorePostMethod')->name('store.post');
Route::get('/all/post','PostController@AllPostMethod')->name('all.post');
Route::get('view/post/{id}','PostController@ViewPostMethod');
Route::get('delete/post/{id}','PostController@DeletePostMethod');
Route::get('edit/post/{id}','PostController@EditPostMethod');
Route::post('update/post/{id}','PostController@UpdatePostMethod');

//Student Routes are here
// Route::get('/students','StudentController@StudentCreateMethod')->name('student');
// Route::post('/store/student','StudentController@StoreStudenetMethod')->name('store.student');
// Route::get('/all/student','StudentController@AllStudenetMethod')->name('all.student');
// Route::get('/view/student/{id}','StudentController@ViewStudenetMethod');
// Route::get('/delete/student/{id}','StudentController@DeleteStudenetMethod');
// Route::get('/edit/student/{id}','StudentController@EditStudenetMethod');
// Route::post('/update/student/{id}','StudentController@UpdateStudenetMethod');

Route::resource('student','StudentController');