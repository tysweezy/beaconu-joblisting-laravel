<?php

class ListingsController extends \BaseController {


	/**
	 * Get all listing data 
	 * 
	 * @return query
	 * 
	 */

	public function allListings() {

        $listings = Listings::orderBy('id', 'DESC')->get();

         //Listings::orderBy('id', 'DESC')->get();


        return View::make('listings')->with('listings', $listings);
	}

    public function apply($id) {

      $id = Listings::where('id', '=', $id);

      if ($id->count()) {

      	$id = $id->first();

	      if (Auth::check()) {
	        
           if (Auth::user()->role == "Student") {
	        return View::make('apply')->with('apply', $id);
	       } else {
	       	return Redirect::to('/')
	       	        ->with('global', 'You must be a student to apply.');
	       }


	      } else {
	      	return Redirect::route('account-login')
	      		   ->with('global', 'You have to be logged in to apply.'); 


	      }
          
     }

    }


    public function postApply($id) {

       $apply = Listings::find($id);

        	
        $rules = array(
          'name'          => 'required',
          'apply-email'   => 'required|email',
          'resume'        => 'max:5000',
          'cover-letter'  => 'required'
        );

    	$validator = Validator::make(Input::all(), $rules);

    	if ($validator->fails()) {
          return Redirect::route('apply-job', array($id))
          		 ->withErrors($validator)
          		 ->withInput();
    	} else {
    	  // Send job application via Email

    		//file logic

           //$listings = Listings::find(1);

    		//dd(Input::all());

    		Mail::send('emails.job.apply', array('company' => $apply->company, 'letter' => Input::get('cover-letter'), 'name' => Input::get('name'), 'applyemail' => Input::get('apply-email')), function($message) use ($apply) {
              $message->to($apply->email, $apply->company)->subject('New Job Application');
    		});
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

       if(Auth::user()->role == "Employer") {
        return View::make('postjob');
       } else {
         return Redirect::to('/')
         		  ->with('global', 'You must be an employer to post a job.');
       }
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

  	  if ($validator->fails()) {
        // flash errors

  	  } else {
       

         // mail job application to employer
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
