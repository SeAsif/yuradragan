<?php

namespace Tests\Feature;
use App\User;
use App\Todo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TodoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */public function test_user_can_login__and_view_todos_and_create()
    {
        $user = factory(User::class)->create([
            'password' => bcrypt($password = '12345678'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);

        //
        $response = $this->actingAs($user)->get("/home/todos");
        //
        $response->assertSee("todos");
        //
        $User = $this->actingAs($user)->get('/home/todos/create');
        //
        $response->assertSee("Add Todo");
        //
        factory(Todo::class , 1)->create(["user_id" => $user->id]);
        //
        $response->assertSuccessful("Todo created successfully");
         //
         //
        $response = $this->actingAs($user)->get("/home/todos");
        //
        $response->assertSee("todos");

    //
    }
}
