<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Gender;

use App\Models\Status;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GenderControllerTest extends TestCase
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
    public function it_displays_index_view_with_genders()
    {
        $genders = Gender::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('genders.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.genders.index')
            ->assertViewHas('genders');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_gender()
    {
        $response = $this->get(route('genders.create'));

        $response->assertOk()->assertViewIs('app.genders.create');
    }

    /**
     * @test
     */
    public function it_stores_the_gender()
    {
        $data = Gender::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('genders.store'), $data);

        unset($data['title']);
        unset($data['description']);
        unset($data['status_id']);

        $this->assertDatabaseHas('genders', $data);

        $gender = Gender::latest('id')->first();

        $response->assertRedirect(route('genders.edit', $gender));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_gender()
    {
        $gender = Gender::factory()->create();

        $response = $this->get(route('genders.show', $gender));

        $response
            ->assertOk()
            ->assertViewIs('app.genders.show')
            ->assertViewHas('gender');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_gender()
    {
        $gender = Gender::factory()->create();

        $response = $this->get(route('genders.edit', $gender));

        $response
            ->assertOk()
            ->assertViewIs('app.genders.edit')
            ->assertViewHas('gender');
    }

    /**
     * @test
     */
    public function it_updates_the_gender()
    {
        $gender = Gender::factory()->create();

        $status = Status::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(15),
            'status_id' => $status->id,
        ];

        $response = $this->put(route('genders.update', $gender), $data);

        unset($data['title']);
        unset($data['description']);
        unset($data['status_id']);

        $data['id'] = $gender->id;

        $this->assertDatabaseHas('genders', $data);

        $response->assertRedirect(route('genders.edit', $gender));
    }

    /**
     * @test
     */
    public function it_deletes_the_gender()
    {
        $gender = Gender::factory()->create();

        $response = $this->delete(route('genders.destroy', $gender));

        $response->assertRedirect(route('genders.index'));

        $this->assertDeleted($gender);
    }
}
