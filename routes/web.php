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

/**
 * {any?} で任意のパスパラメータ any を受け入れています。
 * .+ で「任意の文字が一文字以上」つまり「なんでもいい」という指定をしています。
 * まとめると、any パラメータはあってもなくてもいい（?）し、ある場合はどんな文字列でもいい（.+）ということになります。
 * この記述によって、すべての URL で index テンプレートを返すことができます。
 */
Route::get('/{any?}', function () {
    return view('index');
})->where('any', '.+');
