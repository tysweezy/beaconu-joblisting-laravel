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

}