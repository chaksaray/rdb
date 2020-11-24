<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\PaymentMethod;

use App\Models\Status;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PaymentMethodControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create());

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_payment_methods()
    {
        $paymentMethods = PaymentMethod::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('paymentMethods.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.paymentMethods.index')
            ->assertViewHas('paymentMethods');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_payment_method()
    {
        $response = $this->get(route('paymentMethods.create'));

        $response->assertOk()->assertViewIs('app.paymentMethods.create');
    }

    /**
     * @test
     */
    public function it_stores_the_payment_method()
    {
        $data = PaymentMethod::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('paymentMethods.store'), $data);

        $this->assertDatabaseHas('payment_methods', $data);

        $paymentMethod = PaymentMethod::latest('id')->first();

        $response->assertRedirect(route('paymentMethods.edit', $paymentMethod));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_payment_method()
    {
        $paymentMethod = PaymentMethod::factory()->create();

        $response = $this->get(route('paymentMethods.show', $paymentMethod));

        $response
            ->assertOk()
            ->assertViewIs('app.paymentMethods.show')
            ->assertViewHas('paymentMethod');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_payment_method()
    {
        $paymentMethod = PaymentMethod::factory()->create();

        $response = $this->get(route('paymentMethods.edit', $paymentMethod));

        $response
            ->assertOk()
            ->assertViewIs('app.paymentMethods.edit')
            ->assertViewHas('paymentMethod');
    }

    /**
     * @test
     */
    public function it_updates_the_payment_method()
    {
        $paymentMethod = PaymentMethod::factory()->create();

        $status = Status::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'icon' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
            'status_id' => $status->id,
        ];

        $response = $this->put(
            route('paymentMethods.update', $paymentMethod),
            $data
        );

        $data['id'] = $paymentMethod->id;

        $this->assertDatabaseHas('payment_methods', $data);

        $response->assertRedirect(route('paymentMethods.edit', $paymentMethod));
    }

    /**
     * @test
     */
    public function it_deletes_the_payment_method()
    {
        $paymentMethod = PaymentMethod::factory()->create();

        $response = $this->delete(
            route('paymentMethods.destroy', $paymentMethod)
        );

        $response->assertRedirect(route('paymentMethods.index'));

        $this->assertDeleted($paymentMethod);
    }
}
