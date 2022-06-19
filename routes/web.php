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

// Route::get('/', function () {
//     return view('phone.top');
// });

Route::get('/', 'PhoneProjectCntroller@top');
Route::get('HikakuPhone', 'PhoneProjectCntroller@top');
Route::get('HikakuPhone/form_common', 'PhoneProjectCntroller@form_common');
Route::post('HikakuPhone/form', 'PhoneProjectCntroller@form');
Route::get('HikakuPhone/register', 'PhoneProjectCntroller@register');
Route::get('HikakuPhone/login', 'PhoneProjectCntroller@login');
Route::post('HikakuPhone/save', 'PhoneProjectCntroller@save');
Route::get('HikakuPhone/Mypage', 'PhoneProjectCntroller@page');
Route::get('HikakuPhone/Mypage/high', 'PhoneProjectCntroller@page_high');
Route::get('HikakuPhone/Mypage/low', 'PhoneProjectCntroller@page_low');
Route::get('HikakuPhone/Mypage/edit', 'PhoneProjectCntroller@edit');
Route::post('HikakuPhone/Mypage/edit_store', 'PhoneProjectCntroller@edit_store');

Route::post('HikakuPhone/Docomo', 'DocomoController@docomo');
Route::post('HikakuPhone/au', 'auController@au');
Route::post('HikakuPhone/SoftBank', 'SBController@SB');
Route::post('HikakuPhone/UQ', 'UQController@UQ');
Route::post('HikakuPhone/Y!mobile', 'YMController@YM');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
