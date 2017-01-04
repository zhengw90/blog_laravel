<?php

use App\Article;
use App\Comment;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware'=>'visitors'], function(){
    Route::get('/register', 'RegistrationController@register');
    Route::post('/register', 'RegistrationController@postRegister');

    Route::get('/login', 'LoginController@login');
    Route::post('/login',  'LoginController@postLogin');

    Route::get('/forgot-password', 'ForgotPasswordController@forgotPassword');
    Route::post('/forgot-password', 'ForgotPasswordController@postForgotPassword');

    Route::get('/reset/{email}/{resetCode}', 'ForgotPasswordController@resetPassword');
    Route::post('/reset/{email}/{resetCode}', 'ForgotPasswordController@postResetPassword');

    Route::get('phpinfo', 'PagesController@getInfo' );

});

Route::get('/db', function(){
    return  dd(DB::connection('mysql')); 
});

Route::get('/activate/{email}/{activationCode}', 'ActivationController@activate');


Route::post('/logout', 'LoginController@logout');

Route::get('/earnings', 'AdminController@earnings')->middleware('admin');
Route::get('/tasks', 'ManagerController@tasks')->middleware('managers');


// basic routing
	Route::get('test', function () {
		return view('pages.test');
	});

// named routing
	Route::get('/about', 'PagesController@getAbout')->name("about");
	Route::get('info', 'PagesController@getInfo');
	Route::get('contact', [
			'as'=> 'contact',
			'user'=> 'PagesController@getContact'
	])->name("contact");

	Route::resource('product', 'ProductController');

Route::get('/recipe', function()
{
    $article = Article::find(300); return var_dump($article->title);
    //  $articles = Article::where('id', '>=', 10)->orderBy('title', 'desc')->take(10)->get();
    // $articles = Article::all()->where('id', '>=', 100);
    foreach ($articles as $art){
        var_dump($art->title);
    }
    return;

    $article2 = new Article();
    $article2->title ='how to be successful!';
    $article2->author = 'BBB';
    $article2->genre = 'howto';
    $article2->save();
    return 'Saved article. It has id of '.$article2->id;

    $article = Article::create(array(
        'title'=>'How to peel potatoes',
        'author' => 'AAA',
        'genre' => 'howto'
    ));
    return $article->id;
});

Route::get('/comment', function()
{
    $article = Comment::find(4)->article;
    return dd($article->title);


    $comments = Article::find(2)->comments()->get();
    //return "hi";

    foreach($comments as $comment){
        var_dump($comment->body);
    }


});
