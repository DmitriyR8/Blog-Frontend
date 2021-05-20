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

Route::get('/', 'HomePageController@index');
Route::get('blog', 'BlogArticleController@index');
Route::get('blog/all', 'BlogArticleController@getAllArticles');
Route::get('article-comments/{id}', 'BlogArticleController@getAllCommentsByArticles');
Route::get('blog/{slug}', 'BlogArticleController@getArticleById')->middleware('slug-article');
Route::get('reviews', 'ReviewController@index');
Route::post('comment/create', 'CommentController@store');
Route::get('reviews/all', 'ReviewController@getReviews');
Route::get('review-comments/{id}', 'ReviewController@getAllCommentsByReviews');
Route::get('reviews/{slug}', 'ReviewController@getReviewById')->middleware('slug-review');
Route::get('discounts', 'DiscountController@index');
Route::get('discounts/all', 'DiscountController@getDiscounts');
Route::get('about-us', 'AboutController@index');
Route::post('email/save', 'EmailController@store');
Route::get('search', 'SearchController@search');
Route::get('search/all', 'SearchController@getSearchResult');
Route::get('404', 'ErrorController@index');

