<?php

namespace Tests\Feature;

use App\Models\Movie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MovieTest extends TestCase
{
//    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_movies_are_fetched_successfully()
    {
        \Artisan::call('db:seed');
        $response = $this->get('/api/movies');
        $response->assertStatus(200)
            ->assertJson(["data"=>Movie::all()->toArray()]);

        \Artisan::call('migrate:fresh');
    }

    public function test_movie_is_stored_successfully(){
        $payload = [
            'name' => 'Lorem Ipsum',
            'year' => 1997,
            'director' => 'Lorem Ipsum',
            'protagonist' => 'Lorem Ipsum'
        ];
        $this->post('api/movies', $payload)
            ->assertStatus(201)
            ->assertJson([
                "data"=>
                    [
                        'name' => 'Lorem Ipsum',
                        'year'=> 1997,
                        'director' => 'Lorem Ipsum',
                        'protagonist' => 'Lorem Ipsum',
                        'id' => 1
                    ]
            ]);
        \Artisan::call('migrate:fresh');
    }

    public function test_movie_is_updated_successfully(){
            Movie::create([
            'name' => 'Lorem Ipsum',
            'year' => 1997,
            'director' => 'Lorem Ipsum',
            'protagonist' => 'Lorem Ipsum']);

        $payload = [
            'name' => 'Updated Name'
        ];

        $this->put('/api/movies/1', $payload)
            ->assertStatus(200)
            ->assertJson([
                "data"=>
                    [
                        'name' => 'Updated Name',
                        'year'=> 1997,
                        'director' => 'Lorem Ipsum',
                        'protagonist' => 'Lorem Ipsum',
                        'id' => 1
                    ]
            ]);
    }

    public function test_movie_is_deleted_successfully(){
        $this->delete('/api/movies/1')
            ->assertStatus(204);
    }
}
