<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\PageRole;

use App\Models\Status;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageRoleControllerTest extends TestCase
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
    public function it_displays_index_view_with_page_roles()
    {
        $pageRoles = PageRole::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('pageRoles.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.pageRoles.index')
            ->assertViewHas('pageRoles');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_page_role()
    {
        $response = $this->get(route('pageRoles.create'));

        $response->assertOk()->assertViewIs('app.pageRoles.create');
    }

    /**
     * @test
     */
    public function it_stores_the_page_role()
    {
        $data = PageRole::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('pageRoles.store'), $data);

        $this->assertDatabaseHas('page_roles', $data);

        $pageRole = PageRole::latest('id')->first();

        $response->assertRedirect(route('pageRoles.edit', $pageRole));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_page_role()
    {
        $pageRole = PageRole::factory()->create();

        $response = $this->get(route('pageRoles.show', $pageRole));

        $response
            ->assertOk()
            ->assertViewIs('app.pageRoles.show')
            ->assertViewHas('pageRole');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_page_role()
    {
        $pageRole = PageRole::factory()->create();

        $response = $this->get(route('pageRoles.edit', $pageRole));

        $response
            ->assertOk()
            ->assertViewIs('app.pageRoles.edit')
            ->assertViewHas('pageRole');
    }

    /**
     * @test
     */
    public function it_updates_the_page_role()
    {
        $pageRole = PageRole::factory()->create();

        $status = Status::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(15),
            'status_id' => $status->id,
        ];

        $response = $this->put(route('pageRoles.update', $pageRole), $data);

        $data['id'] = $pageRole->id;

        $this->assertDatabaseHas('page_roles', $data);

        $response->assertRedirect(route('pageRoles.edit', $pageRole));
    }

    /**
     * @test
     */
    public function it_deletes_the_page_role()
    {
        $pageRole = PageRole::factory()->create();

        $response = $this->delete(route('pageRoles.destroy', $pageRole));

        $response->assertRedirect(route('pageRoles.index'));

        $this->assertDeleted($pageRole);
    }
}
