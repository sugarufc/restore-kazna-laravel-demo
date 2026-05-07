<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class DemoModeTest extends TestCase
{
    use RefreshDatabase;

    public function testRegistrationIsDisabledInDemoMode()
    {
        config(['app.demo_mode' => true]);

        $this->get('/register')
            ->assertRedirect('/login')
            ->assertSessionHas('errors', 'Регистрация отключена в демо-режиме.');
    }

    public function testAdminWritesAreBlockedInDemoMode()
    {
        config([
            'app.demo_mode' => true,
            'app.demo_allow_writes' => false,
        ]);

        $admin = User::create([
            'name' => 'Demo Admin',
            'email' => 'demo@example.test',
            'password' => Hash::make('demo-password'),
            'is_admin' => true,
        ]);

        $this->actingAs($admin)
            ->post('/admin/otdel', [
                'f_name' => 'QA Demo Department',
                's_name' => 'QA',
                'sort' => 99,
            ])
            ->assertSessionHas('warning', 'Демо-режим: изменения доступны для просмотра, но не сохраняются.');

        $this->assertDatabaseMissing('otdels', [
            's_name' => 'QA',
        ]);
    }

    public function testDemoAdminCanLogin()
    {
        config(['app.demo_mode' => true]);

        User::create([
            'name' => 'Demo Admin',
            'email' => 'demo@example.test',
            'password' => Hash::make('demo-password'),
            'is_admin' => true,
        ]);

        $this->post('/login', [
            'email' => 'demo@example.test',
            'password' => 'demo-password',
        ])->assertRedirect('/admin');

        $this->assertAuthenticated();
    }
}
