<?php


Route::get('/', 'PageController@index');
Route::get('contact', 'PageController@contact');
Route::get('users/{id?}', 'PageController@users')->where('id', '\d+');


Route::get('articles', 'ArticleController@index')->name('articles.index');
Route::get('articles/{article}', 'ArticleController@show')->name('articles.show');
Route::get('articles/store', 'ArticleController@store')->name('articles.store');
Route::get('articles/update', 'ArticleController@update')->name('articles.update');
Route::get('articles/destroy', 'ArticleController@destroy')->name('articles.destroy');
