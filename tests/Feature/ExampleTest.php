<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_guest_is_redirected_to_login(): void
    {
        $this->get('/')->assertRedirect('/login');
        $this->get('/dashboard')->assertRedirect('/login');
        $this->get('/login')->assertOk();
    }

    public function test_dashboard_renders_for_demo_user(): void
    {
        $this->withSession(['display_name' => 'Ernie'])
            ->get('/dashboard')
            ->assertOk()
            ->assertSeeText('Willkommen, Ernie');
    }
}
