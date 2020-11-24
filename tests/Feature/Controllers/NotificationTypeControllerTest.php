<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\NotificationType;

use App\Models\Status;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NotificationTypeControllerTest extends TestCase
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
    public function it_displays_index_view_with_notification_types()
    {
        $notificationTypes = NotificationType::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('notificationTypes.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.notificationTypes.index')
            ->assertViewHas('notificationTypes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_notification_type()
    {
        $response = $this->get(route('notificationTypes.create'));

        $response->assertOk()->assertViewIs('app.notificationTypes.create');
    }

    /**
     * @test
     */
    public function it_stores_the_notification_type()
    {
        $data = NotificationType::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('notificationTypes.store'), $data);

        $this->assertDatabaseHas('notification_types', $data);

        $notificationType = NotificationType::latest('id')->first();

        $response->assertRedirect(
            route('notificationTypes.edit', $notificationType)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_notification_type()
    {
        $notificationType = NotificationType::factory()->create();

        $response = $this->get(
            route('notificationTypes.show', $notificationType)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.notificationTypes.show')
            ->assertViewHas('notificationType');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_notification_type()
    {
        $notificationType = NotificationType::factory()->create();

        $response = $this->get(
            route('notificationTypes.edit', $notificationType)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.notificationTypes.edit')
            ->assertViewHas('notificationType');
    }

    /**
     * @test
     */
    public function it_updates_the_notification_type()
    {
        $notificationType = NotificationType::factory()->create();

        $status = Status::factory()->create();

        $data = [
            'follower_id' => $this->faker->randomNumber(0),
            'status_id' => $status->id,
        ];

        $response = $this->put(
            route('notificationTypes.update', $notificationType),
            $data
        );

        $data['id'] = $notificationType->id;

        $this->assertDatabaseHas('notification_types', $data);

        $response->assertRedirect(
            route('notificationTypes.edit', $notificationType)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_notification_type()
    {
        $notificationType = NotificationType::factory()->create();

        $response = $this->delete(
            route('notificationTypes.destroy', $notificationType)
        );

        $response->assertRedirect(route('notificationTypes.index'));

        $this->assertDeleted($notificationType);
    }
}
