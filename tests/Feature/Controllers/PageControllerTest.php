<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Page;

use App\Models\Status;
use App\Models\Category;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PageControllerTest extends TestCase
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
    public function it_displays_index_view_with_pages()
    {
        $pages = Page::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('pages.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.pages.index')
            ->assertViewHas('pages');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_page()
    {
        $response = $this->get(route('pages.create'));

        $response->assertOk()->assertViewIs('app.pages.create');
    }

    /**
     * @test
     */
    public function it_stores_the_page()
    {
        $data = Page::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('pages.store'), $data);

        $this->assertDatabaseHas('pages', $data);

        $page = Page::latest('id')->first();

        $response->assertRedirect(route('pages.edit', $page));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_page()
    {
        $page = Page::factory()->create();

        $response = $this->get(route('pages.show', $page));

        $response
            ->assertOk()
            ->assertViewIs('app.pages.show')
            ->assertViewHas('page');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_page()
    {
        $page = Page::factory()->create();

        $response = $this->get(route('pages.edit', $page));

        $response
            ->assertOk()
            ->assertViewIs('app.pages.edit')
            ->assertViewHas('page');
    }

    /**
     * @test
     */
    public function it_updates_the_page()
    {
        $page = Page::factory()->create();

        $category = Category::factory()->create();
        $status = Status::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence(15),
            'website' => $this->faker->text(255),
            'profile' => $this->faker->text(255),
            'cover' => $this->faker->text(255),
            'user_name' => $this->faker->text(255),
            'created_by' => $this->faker->randomNumber(0),
            'status_id' => $this->faker->randomNumber(0),
            'custom_url' => $this->faker->text(255),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'category_id' => $category->id,
            'status_id' => $status->id,
        ];

        $response = $this->put(route('pages.update', $page), $data);

        $data['id'] = $page->id;

        $this->assertDatabaseHas('pages', $data);

        $response->assertRedirect(route('pages.edit', $page));
    }

    /**
     * @test
     */
    public function it_deletes_the_page()
    {
        $page = Page::factory()->create();

        $response = $this->delete(route('pages.destroy', $page));

        $response->assertRedirect(route('pages.index'));

        $this->assertDeleted($page);
    }
}
