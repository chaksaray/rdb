<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\PageUser;

use App\Models\Page;
use App\Models\PageRole;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageUserControllerTest extends TestCase
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
    public function it_displays_index_view_with_page_users()
    {
        $pageUsers = PageUser::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('pageUsers.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.pageUsers.index')
            ->assertViewHas('pageUsers');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_page_user()
    {
        $response = $this->get(route('pageUsers.create'));

        $response->assertOk()->assertViewIs('app.pageUsers.create');
    }

    /**
     * @test
     */
    public function it_stores_the_page_user()
    {
        $data = PageUser::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('pageUsers.store'), $data);

        $this->assertDatabaseHas('page_users', $data);

        $pageUser = PageUser::latest('id')->first();

        $response->assertRedirect(route('pageUsers.edit', $pageUser));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_page_user()
    {
        $pageUser = PageUser::factory()->create();

        $response = $this->get(route('pageUsers.show', $pageUser));

        $response
            ->assertOk()
            ->assertViewIs('app.pageUsers.show')
            ->assertViewHas('pageUser');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_page_user()
    {
        $pageUser = PageUser::factory()->create();

        $response = $this->get(route('pageUsers.edit', $pageUser));

        $response
            ->assertOk()
            ->assertViewIs('app.pageUsers.edit')
            ->assertViewHas('pageUser');
    }

    /**
     * @test
     */
    public function it_updates_the_page_user()
    {
        $pageUser = PageUser::factory()->create();

        $user = User::factory()->create();
        $page = Page::factory()->create();
        $pageRole = PageRole::factory()->create();

        $data = [
            'user_id' => $user->id,
            'page_id' => $page->id,
            'page_role_id' => $pageRole->id,
        ];

        $response = $this->put(route('pageUsers.update', $pageUser), $data);

        $data['id'] = $pageUser->id;

        $this->assertDatabaseHas('page_users', $data);

        $response->assertRedirect(route('pageUsers.edit', $pageUser));
    }

    /**
     * @test
     */
    public function it_deletes_the_page_user()
    {
        $pageUser = PageUser::factory()->create();

        $response = $this->delete(route('pageUsers.destroy', $pageUser));

        $response->assertRedirect(route('pageUsers.index'));

        $this->assertDeleted($pageUser);
    }
}
