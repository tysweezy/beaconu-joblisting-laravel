<?php

class ListingsController extends \BaseController {


	/**
	 * Get all listing data 
	 * 
	 * @return query
	 * 
	 */

	public function allListings() {

        /*Mail::send('emails.auth.test', array('name' => 'Tyler'), function($message) {
        	$message->to('tyler@decipherinc.com', 'Tyler Souza')->subject('Test Email');
        });*/

        $listings = Listings::all();

        return View::make('listings')->with('listings', $listings);
	}

    public function apply($id) {

      $id = Listings::where('id', '=', $id);

      if ($id->count()) {

      	$id = $id->first();

	      if (Auth::check()) {
	        return View::make('apply')->with('apply', $id);
	      } else {
	      	return Redirect::to('/')
	      		   ->with('global', 'You have to be logged in to apply.'); 
	      }

     }

    }


    public function postApply() {

    	
        
        $rules = array(
          'name'          => 'required',
          'apply-email'   => 'required|email',
          'cover-letter'  => 'required'
        );

    	$validator = Validator::make(Input::all(), $rules);

    	if ($validator->fails()) {
          return Redirect::route('apply-job')
          		 ->withErrors($validator)
          		 ->withInput();
    	} else {
    	  // Send job application via Email
    	}
    }

    /**
     * GET => /postjob
     * 
     * Get's postjob view
     * 
     * @return View
     * 
     */ 
    public function job() {
      return View::make('postjob');
    }


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 * @todo add in validation flash errors
	 */
	public function store()
	{
	  
	   $rules = array(
	      'job_title'  => 'required',
	      'company'    => 'required',
	      'email'      => 'required|email|unique:listings'
 	   );


		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes()) {
          $listing = new Listings;

          $listing->job_title = Input::get('job_title');
          $listing->company = Input::get('company');
          $listing->type = Input::get('type');
          $listing->start_date = Input::get('start_date');
          $listing->qualifications = Input::get('qualifications');
          $listing->description = Input::get('description');
          $listing->email = Input::get('email');
		  $listing->salaryrange = Input::get('salaryrange');
		  $listing->apply = Input::get('apply');
    
          $listing->save();

          return Redirect::to('/');
         } else {
         	return Redirect::to('/postjob');
         }
	}


    /**
     * Handles application form on apply page
     * 
     * @return Mail
     * 
     */ 
	public function jobForm() {
  	  $rules = array(
        'name'   => 'required',
        'email'  => 'required|email'
  	  );

  	  $validator = Validator::make(Input::all(), $rules);

  	  if ($validator->passes()) {
        // mail job application to employer
  	  } else {
        // flash errors
  	  }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
