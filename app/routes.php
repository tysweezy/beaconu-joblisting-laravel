<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', 'ListingsController@allListings');
Route::get('postjob', 'ListingsController@job'); 

Route::get('/admin', 'AdminController@index')->before('auth');

Route::resource('/listings', 'ListingsController');
Route::resource('/admin', 'AdminController');




Route::get('/profile/{username}', array(
  'as'    => 'student-profile',
  'uses'  => 'ProfileController@student'
));


/*
 / Authenticated groups
*/

Route::group(array('before' => 'auth'), function() {


  /*
   / CSRF Protection
  */

  Route::group(array('before' => 'csrf'), function(){
      /*
        / Change password (POST)
      */

      Route::post('/account/change-password', array(
        'as'    => 'account-change-password-post',
        'uses'  => 'AccountController@postChangePassword'
      ));



      /**
       * Apply Route (POST)
      **/
      Route::post('/apply/{id}', array(
        'as'   => 'apply-job-post',
        'uses' => 'ListingsController@postApply'
      ));
  });

   
  /*
    / Change password (GET)
  */

  Route::get('/account/change-password', array(
    'as'    => 'account-change-password',
    'uses'  => 'AccountController@getChangePassword'
  ));


  /**
   * Apply Route (GET)
  **/
  Route::get('apply/{id}', array(
    'as'   => 'apply-job',
    'uses' => 'ListingsController@apply'
  ));

  /*
    / Sign out (GET)
  */
 
  Route::get('/account/logout', array(
    'as'    => 'account-logout', 
    'uses'  => 'AccountController@getLogout'
  ));


  Route::get('/profile/private/{username}', array(
    'as'    => 'profile-private',
    'uses'  => 'ProfileController@personal'
  ));

 });


/*
 / Unauthenticated groups
*/
Route::group(array('before' => 'guest'), function() {
 
  
  /*
   / CSRF Protection
  */
  Route::group(array('before' => 'csrf'), function() {
	    
      Route::post('/account/create', array(
	     'as'   => 'account-create-post',
	     'uses' => 'AccountController@postCreate'
	   ));



    /*

     / Forgot Password (POST)

    */

     Route::post('/account/forgot', array(
       'as'    => 'account-forgot-password-post',
       'uses'  => 'AccountController@postForgotPassword'
     ));
  });


  /*

   / Sign in (GET)

  */

   Route::get('/account/login', array(
     'as'    => 'account-login',
     'uses'  => 'AccountController@getLogin'
  ));


  /*

   / Forgot Password (GET)

  */

   Route::get('/account/forgot', array(
     'as'    => 'account-forgot-password',
     'uses'  => 'AccountController@getForgotPassword'
   ));

   Route::get('/account/recovery/{code}', array(
     'as'     => 'account-recover',
     'uses'   => 'AccountController@getRecover'
   ));


  /*

   / Sign in (POST)

  */

   Route::post('/account/login', array(
     'as'    => 'account-login-post',
     'uses'  => 'AccountController@postLogin'
  ));


  /*
   / Create account
  */ 

   Route::get('/account/create', array(
     'as'   => 'account-create',
     'uses' => 'AccountController@getCreate'
   ));

     
   Route::get('/account/activate/{code}', array(
     'as'   => 'account-activate',
     'uses' => 'AccountController@getActivate'
   ));
  });
