<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class BrewDetailTest extends TestCase
{
    use RefreshDatabase;

    public function test_brewery_detail_works(): void
    {
        $user = User::factory()->create();

        $responseList = $this->actingAs($user)->get('/api/brewery');
        $breweryId = $responseList['data']['breweries'][0]['id'];

        $response = $this->actingAs($user)->get('/api/brewery/' . $breweryId);

        $response->assertJson(fn (AssertableJson $json) =>
            $json->has('data')->has('success')
        );
        $response->assertJson(['success' => true]);
    }

    public function test_brewery_detail_fails_on_wrong_id(): void
    {
        $user = User::factory()->create();
        $breweryId = '1234';

        $response = $this->actingAs($user)->get('/api/brewery/' . $breweryId);

        $response->assertStatus(500);
        $response->assertJson(fn (AssertableJson $json) =>
            $json->missing('data')->has('success')->has('message')
        );
        $response->assertJson(['success' => false]);
    }
}
