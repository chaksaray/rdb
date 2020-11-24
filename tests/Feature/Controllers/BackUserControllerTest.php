<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\BackUser;

use App\Models\Status;
use App\Models\BackUserRole;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BackUserControllerTest extends TestCase
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
    public function it_displays_index_view_with_back_users()
    {
        $backUsers = BackUser::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('backUsers.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.backUsers.index')
            ->assertViewHas('backUsers');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_back_user()
    {
        $response = $this->get(route('backUsers.create'));

        $response->assertOk()->assertViewIs('app.backUsers.create');
    }

    /**
     * @test
     */
    public function it_stores_the_back_user()
    {
        $data = BackUser::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('backUsers.store'), $data);

        unset($data['status_id']);

        $this->assertDatabaseHas('back_users', $data);

        $backUser = BackUser::latest('id')->first();

        $response->assertRedirect(route('backUsers.edit', $backUser));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_back_user()
    {
        $backUser = BackUser::factory()->create();

        $response = $this->get(route('backUsers.show', $backUser));

        $response
            ->assertOk()
            ->assertViewIs('app.backUsers.show')
            ->assertViewHas('backUser');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_back_user()
    {
        $backUser = BackUser::factory()->create();

        $response = $this->get(route('backUsers.edit', $backUser));

        $response
            ->assertOk()
            ->assertViewIs('app.backUsers.edit')
            ->assertViewHas('backUser');
    }

    /**
     * @test
     */
    public function it_updates_the_back_user()
    {
        $backUser = BackUser::factory()->create();

        $backUserRole = BackUserRole::factory()->create();
        $status = Status::factory()->create();

        $data = [
            'back_user_role_id' => $backUserRole->id,
            'status_id' => $status->id,
        ];

        $response = $this->put(route('backUsers.update', $backUser), $data);

        unset($data['status_id']);

        $data['id'] = $backUser->id;

        $this->assertDatabaseHas('back_users', $data);

        $response->assertRedirect(route('backUsers.edit', $backUser));
    }

    /**
     * @test
     */
    public function it_deletes_the_back_user()
    {
        $backUser = BackUser::factory()->create();

        $response = $this->delete(route('backUsers.destroy', $backUser));

        $response->assertRedirect(route('backUsers.index'));

        $this->assertDeleted($backUser);
    }
}
