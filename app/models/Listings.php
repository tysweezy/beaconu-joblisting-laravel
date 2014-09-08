<?php

class Listings extends Eloquent {

	/**
	 * database that is used by the model
	 * 
	 * @var string
	 *
	 */

	protected $table = 'listings';

	public $timestamps = false;

	//validation rules
	public static $rules = array(
      'job_title'  => 'required',
      'company'    => 'required',
      'email'      => 'required|email|unique:listings'
 	);
    
  public function order() {
    return $listings = $this->orderBy('id', 'asc')->get(); 
  }

}