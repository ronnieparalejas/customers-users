<?php

namespace Tests\Feature\Model;

use Tests\TestCase;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CustomerTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @test */
    public function it_redirects_to_customer()
    {
        $response = $this->get('/');

        $response->assertRedirect('/customers');
    }

    /** @test */
    public function it_show_customers()
    {
        $response = $this->get(route('customers.index'));

        $response->assertStatus(200);

        $response->assertViewIs('admin.customer.index');

        $response->assertViewHas('customers');
    }

     /** @test */
    public function it_shows_a_customer()
    {
        $customer = Customer::factory(Post::class)->create();

        $response = $this->get(route('customers.show', $customer->id));

        $response->assertStatus(200);

        $response->assertViewIs('admin.customer.show');

        $response->assertViewHas(['customer', 'users']);
    }

    /** @test */
    public function it_shows_a_customer_with_users()
    {
        $customer = Customer::factory()->create();
        $user = User::factory()->create();
        
        $this->assertTrue($customer->users->contains($user));
        ## $this->assertEquals(1, $customer->users->count());
    }

}
