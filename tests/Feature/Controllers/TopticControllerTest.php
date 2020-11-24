<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Toptic;

use App\Models\Status;
use App\Models\Category;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TopticControllerTest extends TestCase
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
    public function it_displays_index_view_with_toptics()
    {
        $toptics = Toptic::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('toptics.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.toptics.index')
            ->assertViewHas('toptics');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_toptic()
    {
        $response = $this->get(route('toptics.create'));

        $response->assertOk()->assertViewIs('app.toptics.create');
    }

    /**
     * @test
     */
    public function it_stores_the_toptic()
    {
        $data = Toptic::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('toptics.store'), $data);

        unset($data['title']);
        unset($data['description']);
        unset($data['status_id']);
        unset($data['image']);
        unset($data['icon']);

        $this->assertDatabaseHas('toptics', $data);

        $toptic = Toptic::latest('id')->first();

        $response->assertRedirect(route('toptics.edit', $toptic));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_toptic()
    {
        $toptic = Toptic::factory()->create();

        $response = $this->get(route('toptics.show', $toptic));

        $response
            ->assertOk()
            ->assertViewIs('app.toptics.show')
            ->assertViewHas('toptic');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_toptic()
    {
        $toptic = Toptic::factory()->create();

        $response = $this->get(route('toptics.edit', $toptic));

        $response
            ->assertOk()
            ->assertViewIs('app.toptics.edit')
            ->assertViewHas('toptic');
    }

    /**
     * @test
     */
    public function it_updates_the_toptic()
    {
        $toptic = Toptic::factory()->create();

        $category = Category::factory()->create();
        $status = Status::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(15),
            'icon' => $this->faker->text(255),
            'category_id' => $category->id,
            'status_id' => $status->id,
        ];

        $response = $this->put(route('toptics.update', $toptic), $data);

        unset($data['title']);
        unset($data['description']);
        unset($data['status_id']);
        unset($data['image']);
        unset($data['icon']);

        $data['id'] = $toptic->id;

        $this->assertDatabaseHas('toptics', $data);

        $response->assertRedirect(route('toptics.edit', $toptic));
    }

    /**
     * @test
     */
    public function it_deletes_the_toptic()
    {
        $toptic = Toptic::factory()->create();

        $response = $this->delete(route('toptics.destroy', $toptic));

        $response->assertRedirect(route('toptics.index'));

        $this->assertDeleted($toptic);
    }
}
