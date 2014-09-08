<?php

class AccountController extends BaseController {


  public function getLogin() {
    return View::make('account.login');
  }

  public function postLogin() {
    
    $rules = array(
      'email'     => 'required|email',
      'password'  => 'required'
    );

    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails()) {
      
      return Redirect::route('account-login')
                ->withErrors($validator)
                ->withInput();

    } else {

      $remember = (Input::has('remember')) ? true : false;
      
      $creds = Auth::attempt([
        'email'     => Input::get('email'),
        'password'  => Input::get('password'),
        'active'    => 1
      ], $remember);
      
      if ($creds) {
      
        return Redirect::to('/');

      } else {
        return Redirect::route('account-login')->with('global', 'Email/password wrong or account not activated.');
      }

    } 

    return Redirect::route('account-login')->with('global', 'There was a problem with signing you in.');
  }


  public function getlogout() { 
    Auth::logout();
    return Redirect::to('/')->with('global', 'You are now logged out.');
  }


  public function getChangePassword() {
    return View::make('account.password');
  }


  public function postChangePassword() {
      
    $password_rules = array(
      'old_password'    => 'required',
      'password'        => 'required|min:6',
      'password_repeat' => 'required|same:password' 
    );

    $validator = Validator::make(Input::all(), $password_rules);


    if ($validator->fails()) {
      return Redirect::route('account-change-password')
                ->withErrors($validator);
    } else { 
      $user         = User::find(Auth::user()->id);

      $old_password = Input::get('old_password');
      $password     = Input::get('password');

      if (Hash::check($old_password, $user->getAuthPassword())) {
        $user->password = Hash::make($password);

        if ($user->save()) {
          return Redirect::to('/')
                    ->with('global', 'You password has been successfully changed');
        } 
      }

    }

    return Redirect::route('account-change-password')
              ->with('global', 'Your password could not be changed');
  }

  public function getForgotPassword() {
    return View::make('account.forgot');
  }

  public function postForgotPassword() {
    $validator = Validator::make(Input::all(), array(
      'email'  => 'required|email'
    ));

    if ($validator->fails()) {
      return Redirect::route('account-forgot-password')
             ->withErrors($validator)
             ->withInput();
    } else { 
      
      $user = User::where('email', '=', Input::get('email'));

      if ($user->count()) {
         $user = $user->first();

         // Generate new code and password
        $code         = str_random(60);
        $password     = str_random(10);

        $user->code            = $code;
        $user->password_temp   = Hash::make($password); 

        if ($user->save()) {
          Mail::send('emails.auth.forgot', array('link' => URL::route('account-recover', $code), 'username' => $user->username, 'password' => $password), function($message) use ($user) {
            $message->to($user->email, $user->username)->subject('Your new password');
          }); 


          return Redirect::to('/')
                  ->with('global', 'We have sent you email to change your password');
        }
      }
    }

    return Redirect::route('account-forgot-password')
              ->with('global', 'Cannot request new password');
  }


	public function getCreate() {
	  return View::make('account.create');
	}

	public function postCreate() {
      // validate and input data 

	  // rules
	  $rules = array(
        'username'        => 'required|min:5|unique:users',
        'email'           => 'required|email|unique:users',
        'first_name'      => 'required',
        'last_name'       => 'required',
        'password'        => 'required|min:6',
        'password_repeat' => 'required|same:password',
        'role'            => 'required'
	  );

      //validate
	  $validate = Validator::make(Input::all(), $rules);

      if ($validate->fails()) {
        return Redirect::route('account-create')->withErrors($validate)->withInput(); 
      } else {
        /*$username    = Input::get('username');
        $email       = Input::get('email');
        $first_name  = Input::get('first_name');
        $last_name   = Input::get('last_name');
        $password    = Input::get('password');
        $role        = Input::get('role');*/// fuck shit fuck wont work

        $username = Input::get('username');
        
        //activation code

        $code = str_random(60);


        /*$user = User::create(array(
          'username'   => $username,
          'email'      => $email,
          'first_name' => $first_name,
          'last_name'  => $last_name,
          'password'   => Hash::make($password),
          'code'       => $code, 
          'active'     => 0,
          'role'       => $role // eat a dick
        ));*/


      $user = new User;

      $user->username    = Input::get('username');
      $user->email       = Input::get('email');
      $user->first_name  = Input::get('first_name');
      $user->last_name   = Input::get('last_name');
      $user->password    = Hash::make(Input::get('password'));
      $user->code        = $code;
      $user->active      = 0;
      $user->role        = Input::get('role'); // $user->save() worked over User::create for select dropdowns for some reason...
  

      
       if ($user->save()) {
         Mail::send('emails.auth.activate', array('link' => URL::route('account-activate', $code), 'username' => $username), function($message) use ($user) {
           $message->to($user->email, $user->username)->subject('Activate your account');
         });  

         return Redirect::to('/')
          			->with('global', 'You have created your account! We have sent you an email to activate it.');
       }

      } 

	}


  public function getActivate($code) {
    $user = User::where('code', '=', $code)->where('active', '=', 0);



    if ($user->count()) {
      $user = $user->first();

      $user->active = 1;
      $user->code   = '';

      if ($user->save()) {
        return Redirect::to('/')
                  ->with('global', 'Activated! You can now sign in.');
      }
    }

    return Redirect::to('/')
              ->with('global', 'We could not activate your account. Please try again later.');



  }


  public function getRecover($code) {
    $user = User::where('code', '=', $code)
             ->where('password_temp', '!=', '');

    if ($user->count()) {
      $user = $user->first();

      $user->password       = $user->password_temp;
      $user->password_temp  = '';
      $user->code           = '';

      if ($user->save()) {
        return Redirect::to('/')
                ->with('global', 'Your account has been recovered and you can sign in with your new password.');
      }
    }

    return Redirect::to('/')
            ->with('global', 'Could not recover your password.');
  }
}
