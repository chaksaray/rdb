<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ArticleStatus;

use App\Models\Status;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleStatusControllerTest extends TestCase
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
    public function it_displays_index_view_with_article_statuses()
    {
        $articleStatuses = ArticleStatus::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('articleStatuses.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.articleStatuses.index')
            ->assertViewHas('articleStatuses');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_article_status()
    {
        $response = $this->get(route('articleStatuses.create'));

        $response->assertOk()->assertViewIs('app.articleStatuses.create');
    }

    /**
     * @test
     */
    public function it_stores_the_article_status()
    {
        $data = ArticleStatus::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('articleStatuses.store'), $data);

        unset($data['status_id']);

        $this->assertDatabaseHas('article_statuses', $data);

        $articleStatus = ArticleStatus::latest('id')->first();

        $response->assertRedirect(
            route('articleStatuses.edit', $articleStatus)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_article_status()
    {
        $articleStatus = ArticleStatus::factory()->create();

        $response = $this->get(route('articleStatuses.show', $articleStatus));

        $response
            ->assertOk()
            ->assertViewIs('app.articleStatuses.show')
            ->assertViewHas('articleStatus');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_article_status()
    {
        $articleStatus = ArticleStatus::factory()->create();

        $response = $this->get(route('articleStatuses.edit', $articleStatus));

        $response
            ->assertOk()
            ->assertViewIs('app.articleStatuses.edit')
            ->assertViewHas('articleStatus');
    }

    /**
     * @test
     */
    public function it_updates_the_article_status()
    {
        $articleStatus = ArticleStatus::factory()->create();

        $status = Status::factory()->create();

        $data = [
            'status_id' => $status->id,
        ];

        $response = $this->put(
            route('articleStatuses.update', $articleStatus),
            $data
        );

        unset($data['status_id']);

        $data['id'] = $articleStatus->id;

        $this->assertDatabaseHas('article_statuses', $data);

        $response->assertRedirect(
            route('articleStatuses.edit', $articleStatus)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_article_status()
    {
        $articleStatus = ArticleStatus::factory()->create();

        $response = $this->delete(
            route('articleStatuses.destroy', $articleStatus)
        );

        $response->assertRedirect(route('articleStatuses.index'));

        $this->assertDeleted($articleStatus);
    }
}
