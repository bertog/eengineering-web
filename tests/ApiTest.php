<?php 

use App\Post;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiTest extends TestCase
{
	/** @test **/
	public function it_retrieve_the_published_posts()
	{
	    $this->get('/api/posts')
	    	->seeStatusCode(200)
	    	->seeJson()
	    	->seeJsonContains(['slug' => 'tube-matching']);
	}
}