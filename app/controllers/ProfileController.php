<?php

class ProfileController extends BaseController {
  
  public function student($username) {
    
    $user = User::where('username', '=', $username);

    if ($user->count()) {
      $user = $user->first();
      

      return View::make('profile.student')
      			->with('user', $user);

    }

    return App::abort('404'); 
  }

  public function personal($username) {

  	 if (Auth::check()) {

	    $user = User::where('username', '=', $username);

	    if ($user->count()) {
	      $user = $user->first();

	      if (Auth::user()->username != $username) {
	      	return Redirect::to('/');
	      } 
	      

	      return View::make('profile.private')
	      			->with('user', $user);

	    }

	    return App::abort('404'); 

	  }

  }

}