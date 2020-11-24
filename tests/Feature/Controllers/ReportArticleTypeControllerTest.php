<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ReportArticleType;

use App\Models\Status;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReportArticleTypeControllerTest extends TestCase
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
    public function it_displays_index_view_with_report_article_types()
    {
        $reportArticleTypes = ReportArticleType::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('reportArticleTypes.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.reportArticleTypes.index')
            ->assertViewHas('reportArticleTypes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_report_article_type()
    {
        $response = $this->get(route('reportArticleTypes.create'));

        $response->assertOk()->assertViewIs('app.reportArticleTypes.create');
    }

    /**
     * @test
     */
    public function it_stores_the_report_article_type()
    {
        $data = ReportArticleType::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('reportArticleTypes.store'), $data);

        unset($data['status_id']);
        unset($data['title']);
        unset($data['description']);

        $this->assertDatabaseHas('report_article_types', $data);

        $reportArticleType = ReportArticleType::latest('id')->first();

        $response->assertRedirect(
            route('reportArticleTypes.edit', $reportArticleType)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_report_article_type()
    {
        $reportArticleType = ReportArticleType::factory()->create();

        $response = $this->get(
            route('reportArticleTypes.show', $reportArticleType)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.reportArticleTypes.show')
            ->assertViewHas('reportArticleType');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_report_article_type()
    {
        $reportArticleType = ReportArticleType::factory()->create();

        $response = $this->get(
            route('reportArticleTypes.edit', $reportArticleType)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.reportArticleTypes.edit')
            ->assertViewHas('reportArticleType');
    }

    /**
     * @test
     */
    public function it_updates_the_report_article_type()
    {
        $reportArticleType = ReportArticleType::factory()->create();

        $status = Status::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(15),
            'status_id' => $status->id,
        ];

        $response = $this->put(
            route('reportArticleTypes.update', $reportArticleType),
            $data
        );

        unset($data['status_id']);
        unset($data['title']);
        unset($data['description']);

        $data['id'] = $reportArticleType->id;

        $this->assertDatabaseHas('report_article_types', $data);

        $response->assertRedirect(
            route('reportArticleTypes.edit', $reportArticleType)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_report_article_type()
    {
        $reportArticleType = ReportArticleType::factory()->create();

        $response = $this->delete(
            route('reportArticleTypes.destroy', $reportArticleType)
        );

        $response->assertRedirect(route('reportArticleTypes.index'));

        $this->assertDeleted($reportArticleType);
    }
}
