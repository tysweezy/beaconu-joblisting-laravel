 <?php

class ListingTableSeeder extends Seeder {
	public function run()
	    {
	        DB::table('listings')->delete();

	        $listings = array(
	            array(
	                'job_title'      => 'Web Developer',
	                'company'        => 'Decipher',
	                'type'           => 'Part Time',
	                'start_date'     => '2014-07-30',
	                'qualifications' => 'Python, XML',
	                'description'    => 'Something cool.',
	                'email'          => 'tyler@decipherinc.com',
	                'salaryrange'    => 'N/A',
	                'apply'          => 'Website'
	            ),

	            array(
	                'job_title'      => 'Designer',
	                'company'        => 'Bacon Corp',
	                'type'           => 'Full Time',
	                'start_date'     => '2014-08-15',
	                'qualifications' => 'Photoshop, HTML, CSS',
	                'description'    => 'Designer who creates cool stuff.',
	                'email'          => 'bacon@baconcorp.com',
	                'salaryrange'    => 'N/A',
	                'apply'          => 'Website'
	            )
	        );

	        DB::table('listings')->insert( $listings );
	    }
}