<?php

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

Route::group(['prefix'=>'member'],function(){
   Route::get('/login','Auth\MemberLoginController@showLoginForm')->name('member.login');
   Route::post('/login','Auth\MemberLoginController@login')->name('member.login.submit');
   Route::get('/login','Auth\MemberLoginController@showLoginForm')->name('member.login');
   Route::post('/login','Auth\MemberLoginController@login')->name('member.login.submit');
   Route::get('/register','Auth\MemberLoginController@showRegisterForm')->name('member.register');
   Route::post('/register','Auth\MemberLoginController@register')->name('member.register.submit');
   Route::post('/logout','Auth\MemberLoginController@logout')->name('
      member.logout');
   Route::post('/password/email', 'Auth\MemberForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
   Route::get('/password/reset', 'Auth\MemberForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
   Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
   Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
   Route::get('/profile/{id}','web@member_page')->name('profile')->middleware('member');
   Route::get('/profile/edit/{id}','web@edit_page')->middleware('member');
   Route::post('/profile/edit/{id}','web@postedit_page')->middleware('member');
});
   
Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

   Route::get('/', 'HomeController@index')->name('home');
   //Route::get('/', 'HomeController@getdashborad')->name('dashbroad');
   Route::group(['prefix'=>'theloai'],function(){
		Route::get('danhsach', 'TheLoaiController@getdanhsach')->name('categorylist');
   	Route::get('sua/{id}','TheLoaiController@getsua');
      Route::post('sua/{id}','TheLoaiController@postsua');
   	Route::get('them','TheLoaiController@getthem');
      Route::post('them','TheLoaiController@postthem');
      Route::get('xoa/{id}', 'TheLoaiController@getxoa');
   });
   Route::group(['prefix'=>'loaitin'],function(){
   	Route::get('danhsach', 'LoaiTinController@getdanhsach')->name('typelist');
   	Route::get('sua/{id}','LoaiTinController@getsua');
      Route::post('sua/{id}','LoaiTinController@postsua');
		Route::get('them','LoaiTinController@getthem');
      Route::post('them', 'LoaiTinController@postthem');
      Route::get('xoa/{id}','LoaiTinController@getxoa');
   });
   Route::group(['prefix'=>'tintuc'],function(){
		Route::get('danhsach', 'TinTucController@getdanhsach')->name('postlist');
   	Route::get('sua/{id}','TinTucController@getsua');
      Route::post('sua/{id}','TinTucController@postsua');
      Route::post('them', 'TinTucController@postthem');
   	Route::get('them','TinTucController@getthem');
      Route::get('xoa/{id}', 'TinTucController@getxoa');
      Route::get('xoa/cmt/{id}','cmtcontroller@getxoa');
   });
   Route::get('comment/danhsach','cmtcontroller@danhsach')->name('commentlist');
   Route::group(['prefix'=>'ajax'],function(){
      Route::get('loaitin/{idTheLoai}','AjaxController@getLoaiTin');
   });
   Route::group(['prefix'=>'user'],function(){
      Route::get('danhsach', 'MemberController@getdanhsach');
      Route::get('xoa/{id}', 'MemberController@getxoa');
   });
   Route::get('/logout','LoginCotroller@logout')->name('admin.logout');
});


Route::get('/', 'web@index')->name('index');
Route::get('/contact', 'web@contact');
Route::get('/about', 'web@about');
// Route::get('/post', function () {
//     return view('pages.single_post');
// });
Route::get('/{catagories}/{id}','web@single_post')->name('member.comment.submit');
Route::post('/{catagories}/{id}','web@postcmt')->name('member.comment.submit');
Route::get('/{catagories}','web@catagories_post');
