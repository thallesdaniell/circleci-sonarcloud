<?php

namespace Tests\Feature;

use App\Test;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class TestTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    private $user;

    protected function setup(): void
    {
        parent::setUp();
        Artisan::call('db:seed');

        $this->user = factory(User::class)->create();
        $this->be($this->user);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('api/test');
        $response->assertStatus(200);
    }


    public function testStore()
    {
        $response = $this->json('POST', 'api/test', [
            'name'        => $this->faker->name,
            'description' => $this->faker->text
        ]);
        $response->assertSuccessful();
    }

    public function testUpdate()
    {
        $test     = factory(Test::class)->create();
        $response = $this->json('PUT', "api/test/{$test->id}", [
            'name'        => $this->faker->name,
            'description' => $this->faker->text
        ]);
        $response->assertSuccessful();
    }


    public function testDestroy()
    {
        $test     = factory(Test::class)->create();
        $response = $this->delete("api/test/{$test->id}");
        $response->assertSuccessful();
    }
}
