<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\NewsLetterType;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewsLetterTypeControllerTest extends TestCase
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
    public function it_displays_index_view_with_news_letter_types()
    {
        $newsLetterTypes = NewsLetterType::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('newsLetterTypes.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.newsLetterTypes.index')
            ->assertViewHas('newsLetterTypes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_news_letter_type()
    {
        $response = $this->get(route('newsLetterTypes.create'));

        $response->assertOk()->assertViewIs('app.newsLetterTypes.create');
    }

    /**
     * @test
     */
    public function it_stores_the_news_letter_type()
    {
        $data = NewsLetterType::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('newsLetterTypes.store'), $data);

        $this->assertDatabaseHas('news_letter_types', $data);

        $newsLetterType = NewsLetterType::latest('id')->first();

        $response->assertRedirect(
            route('newsLetterTypes.edit', $newsLetterType)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_news_letter_type()
    {
        $newsLetterType = NewsLetterType::factory()->create();

        $response = $this->get(route('newsLetterTypes.show', $newsLetterType));

        $response
            ->assertOk()
            ->assertViewIs('app.newsLetterTypes.show')
            ->assertViewHas('newsLetterType');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_news_letter_type()
    {
        $newsLetterType = NewsLetterType::factory()->create();

        $response = $this->get(route('newsLetterTypes.edit', $newsLetterType));

        $response
            ->assertOk()
            ->assertViewIs('app.newsLetterTypes.edit')
            ->assertViewHas('newsLetterType');
    }

    /**
     * @test
     */
    public function it_updates_the_news_letter_type()
    {
        $newsLetterType = NewsLetterType::factory()->create();

        $data = [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence(15),
        ];

        $response = $this->put(
            route('newsLetterTypes.update', $newsLetterType),
            $data
        );

        $data['id'] = $newsLetterType->id;

        $this->assertDatabaseHas('news_letter_types', $data);

        $response->assertRedirect(
            route('newsLetterTypes.edit', $newsLetterType)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_news_letter_type()
    {
        $newsLetterType = NewsLetterType::factory()->create();

        $response = $this->delete(
            route('newsLetterTypes.destroy', $newsLetterType)
        );

        $response->assertRedirect(route('newsLetterTypes.index'));

        $this->assertDeleted($newsLetterType);
    }
}
