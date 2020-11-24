<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\ReportUserType;

use App\Models\Status;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReportUserTypeControllerTest extends TestCase
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
    public function it_displays_index_view_with_report_user_types()
    {
        $reportUserTypes = ReportUserType::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('reportUserTypes.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.reportUserTypes.index')
            ->assertViewHas('reportUserTypes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_report_user_type()
    {
        $response = $this->get(route('reportUserTypes.create'));

        $response->assertOk()->assertViewIs('app.reportUserTypes.create');
    }

    /**
     * @test
     */
    public function it_stores_the_report_user_type()
    {
        $data = ReportUserType::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('reportUserTypes.store'), $data);

        unset($data['status_id']);
        unset($data['title']);
        unset($data['description']);

        $this->assertDatabaseHas('report_user_types', $data);

        $reportUserType = ReportUserType::latest('id')->first();

        $response->assertRedirect(
            route('reportUserTypes.edit', $reportUserType)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_report_user_type()
    {
        $reportUserType = ReportUserType::factory()->create();

        $response = $this->get(route('reportUserTypes.show', $reportUserType));

        $response
            ->assertOk()
            ->assertViewIs('app.reportUserTypes.show')
            ->assertViewHas('reportUserType');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_report_user_type()
    {
        $reportUserType = ReportUserType::factory()->create();

        $response = $this->get(route('reportUserTypes.edit', $reportUserType));

        $response
            ->assertOk()
            ->assertViewIs('app.reportUserTypes.edit')
            ->assertViewHas('reportUserType');
    }

    /**
     * @test
     */
    public function it_updates_the_report_user_type()
    {
        $reportUserType = ReportUserType::factory()->create();

        $status = Status::factory()->create();

        $data = [
            'title' => $this->faker->sentence(10),
            'description' => $this->faker->sentence(15),
            'status_id' => $status->id,
        ];

        $response = $this->put(
            route('reportUserTypes.update', $reportUserType),
            $data
        );

        unset($data['status_id']);
        unset($data['title']);
        unset($data['description']);

        $data['id'] = $reportUserType->id;

        $this->assertDatabaseHas('report_user_types', $data);

        $response->assertRedirect(
            route('reportUserTypes.edit', $reportUserType)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_report_user_type()
    {
        $reportUserType = ReportUserType::factory()->create();

        $response = $this->delete(
            route('reportUserTypes.destroy', $reportUserType)
        );

        $response->assertRedirect(route('reportUserTypes.index'));

        $this->assertDeleted($reportUserType);
    }
}
