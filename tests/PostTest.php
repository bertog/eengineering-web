<?php

use App\Post;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase
{

    use DatabaseTransactions;
    /** @test */
    public function a_post_automatically_create_a_slug()
    {
        $post = factory('App\Post')->create(['title' => 'My Blog Post']);

        $this->assertEquals('my-blog-post', $post->slug);
    }

    /** @test */
    public function a_post_cant_have_duplicated_slug()
    {
        factory('App\Post')->create(['title' => 'My Blog Post']);
        factory('App\Post')->create(['title' => 'My Blog Post']);

        $latestPost = factory('App\Post')->create(['title' => 'My Blog Post']);

        $this->assertEquals('my-blog-post-2', $latestPost->slug);
    }

    /** @test */
    public function retrieve_only_the_published_post()
    {
        factory('App\Post')->create(['published' => '2015-01-01']);
        factory('App\Post')->create(['published' => '2015-01-01']);

        $notPublished = factory('App\Post')->create(['published' => '2030-12-31']);

        $this->assertCount(2, Post::PublishedPost()->get());

    }
}
