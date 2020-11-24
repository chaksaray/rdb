<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\BackUserRole;

use App\Models\Status;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BackUserRoleControllerTest extends TestCase
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
    public function it_displays_index_view_with_back_user_roles()
    {
        $backUserRoles = BackUserRole::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('backUserRoles.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.backUserRoles.index')
            ->assertViewHas('backUserRoles');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_back_user_role()
    {
        $response = $this->get(route('backUserRoles.create'));

        $response->assertOk()->assertViewIs('app.backUserRoles.create');
    }

    /**
     * @test
     */
    public function it_stores_the_back_user_role()
    {
        $data = BackUserRole::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('backUserRoles.store'), $data);

        unset($data['status_id']);

        $this->assertDatabaseHas('back_user_roles', $data);

        $backUserRole = BackUserRole::latest('id')->first();

        $response->assertRedirect(route('backUserRoles.edit', $backUserRole));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_back_user_role()
    {
        $backUserRole = BackUserRole::factory()->create();

        $response = $this->get(route('backUserRoles.show', $backUserRole));

        $response
            ->assertOk()
            ->assertViewIs('app.backUserRoles.show')
            ->assertViewHas('backUserRole');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_back_user_role()
    {
        $backUserRole = BackUserRole::factory()->create();

        $response = $this->get(route('backUserRoles.edit', $backUserRole));

        $response
            ->assertOk()
            ->assertViewIs('app.backUserRoles.edit')
            ->assertViewHas('backUserRole');
    }

    /**
     * @test
     */
    public function it_updates_the_back_user_role()
    {
        $backUserRole = BackUserRole::factory()->create();

        $status = Status::factory()->create();

        $data = [
            'status_id' => $status->id,
        ];

        $response = $this->put(
            route('backUserRoles.update', $backUserRole),
            $data
        );

        unset($data['status_id']);

        $data['id'] = $backUserRole->id;

        $this->assertDatabaseHas('back_user_roles', $data);

        $response->assertRedirect(route('backUserRoles.edit', $backUserRole));
    }

    /**
     * @test
     */
    public function it_deletes_the_back_user_role()
    {
        $backUserRole = BackUserRole::factory()->create();

        $response = $this->delete(
            route('backUserRoles.destroy', $backUserRole)
        );

        $response->assertRedirect(route('backUserRoles.index'));

        $this->assertDeleted($backUserRole);
    }
}
