<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class BrewListTest extends TestCase
{
    use RefreshDatabase;

    public function test_brewery_list_works(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/api/brewery');


        $response->assertJson(fn (AssertableJson $json) =>
            $json->has('data')->has('success')
        );
        $response->assertJson(['success' => true]);
    }

    public function test_brewery_list_pagination_works(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/api/brewery?page=4&per_page=10');


        $response->assertJson(fn (AssertableJson $json) =>
            $json->has('data')->has('success')
        );

        $response->assertJsonPath('data.page', '4');
        $response->assertJsonPath('data.per_page', '10');
        $this->assertEquals(10, sizeof($response['data']['breweries']));
    }
}
