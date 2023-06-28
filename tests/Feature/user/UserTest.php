<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;//genrar datos fake
use Illuminate\Foundation\Testing\DatabaseTransactions;//genera una copia de la base de datos y la regenera al terminar el test
use Illuminate\Foundation\Testing\Assert as PHPUnit;//assertDeleted() es una función de PHPUnit que no está disponible en Laravel por defecto
use App\Models\User;//para generar usuarios test

class UserTest extends TestCase
{
    use DatabaseTransactions, WithFaker;
    /**
     * A create test example.
     */
    public function testUserCreation(): void
    {
        //esto desactiva el middleware para rutas que requieren token
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        //definimos las variables a enviar en el post
        $payload = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password',
        ];

        //hacemos el post
        $response = $this->postJson('/api/v1/users', $payload);

        //verificamos que se haya creado correctamente, debemos recibir un 201
        $response->assertCreated();

        //revisamos si el record exite en la base de datos
        $this->assertDatabaseHas('users', [
            'name' => $payload['name'],
            'email' => $payload['email'],
        ]);
   
    }
    /**
     * A consult test example.
     */
    public function testUserConsulting(): void
    {
        //esto desactiva el middleware para rutas que requieren token
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        //generamos un usuario test
        $user = User::factory()->create();

        //hacemos el get
        $response = $this->getJson('/api/v1/users/'.$user->id);

        //verificamos que se haya recibido un 200 y que contenga email y nombre
        $response->assertOk()
        ->assertJsonFragment([
            'name' => $user->name,
            'email' => $user->email,
        ]);
   
    }
    /**
     * A modify test example.
     */
    public function testUserModify(): void
    {
        //esto desactiva el middleware para rutas que requieren token
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        //generamos un usuario test
        $user = User::factory()->create();

        //realizamos la modificacion del registro
        $response = $this->putJson('/api/v1/users/'.$user->id, [
            'name' => 'New Name',
            'email' => 'newemail@example.com',
        ]);

        //verificamos que se haya realizado la modificacion
        $response->assertOk();

        //revisamos si el record exite en la base de datos con los nuevos datos
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'New Name',
            'email' => 'newemail@example.com',
        ]);
    }
    /**
     * A destroy test example.
     */
    public function testUserDestroy(): void
    {
        //esto desactiva el middleware para rutas que requieren token
        $this->withoutMiddleware(\App\Http\Middleware\Authenticate::class);

        //generamos un usuario test
        $user = User::factory()->create();

        //eliminamos el registro
        $response = $this->delete('/api/v1/users/'.$user->id);

        //verificamos respuesta 204 (no content)
        $response->assertNoContent();

        //verificamos que no exista el registro en la base de datos
        $this->assertDeleted($user);
    }
}
