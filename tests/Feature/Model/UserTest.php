<?php

namespace Tests\Feature\Model;

use Tests\TestCase;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;

class UserTest extends TestCase
{
    use DatabaseMigrations, InteractsWithExceptionHandling;

    /** @test */
    public function test_it_shows_add_user_view()
    {
        $customer = Customer::factory()->create();

        $response = $this->get(route('users.create', $customer->id));

        $response->assertStatus(200);

        $response->assertViewIs('admin.user.create');

        $response->assertViewHas('customer');
    }

    /** @test */
    public function it_can_add_user_to_a_customer()
    {
        $customer = Customer::factory()->create();

        $response = $this->post(route('users.store', $customer->id), [
                'name' => 'John Doe',
                'email' => 'johndoe@email.com',
                'serial' => Str::random(),
                'customer_id' => $customer->id
            ]);

        $response->assertStatus(302);

        $response->assertRedirect();
    }  

    /** @test */
    public function it_validates_name()
    {
        $customer = Customer::factory()->create();

        $response = $this->post(route('users.store', $customer->id), [
                'name' => null,
                'email' => 'johndoe@email.com',
                'serial' => Str::random(),
                'customer_id' => $customer->id
            ]);

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function it_validates_email()
    {
        $customer = Customer::factory()->create();

        $response = $this->post(route('users.store', $customer->id), [
                'name' => 'John Doe',
                'email' => null,
                'serial' => Str::random(),
                'customer_id' => $customer->id
            ]);

        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function it_validates_serial()
    {
        $customer = Customer::factory()->create();

        $response = $this->post(route('users.store', $customer->id), [
                'name' => 'John Doe',
                'email' => 'johndoe@email.com',
                'serial' => null,
                'customer_id' => $customer->id
            ]);

        $response->assertSessionHasErrors('serial');
    }

    /** @test */
    public function it_can_delete_user_from_a_customer()
    {
        Customer::factory()->create();

        $user = User::factory()->create();

        $response = $this->delete(route('users.destroy', $user->id));

        $response->assertStatus(302);

        $response->assertRedirect();
    }  

}
