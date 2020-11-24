<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\AccountType;

use App\Models\Status;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AccountTypeControllerTest extends TestCase
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
    public function it_displays_index_view_with_account_types()
    {
        $accountTypes = AccountType::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('accountTypes.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.accountTypes.index')
            ->assertViewHas('accountTypes');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_account_type()
    {
        $response = $this->get(route('accountTypes.create'));

        $response->assertOk()->assertViewIs('app.accountTypes.create');
    }

    /**
     * @test
     */
    public function it_stores_the_account_type()
    {
        $data = AccountType::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('accountTypes.store'), $data);

        unset($data['status_id']);

        $this->assertDatabaseHas('account_types', $data);

        $accountType = AccountType::latest('id')->first();

        $response->assertRedirect(route('accountTypes.edit', $accountType));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_account_type()
    {
        $accountType = AccountType::factory()->create();

        $response = $this->get(route('accountTypes.show', $accountType));

        $response
            ->assertOk()
            ->assertViewIs('app.accountTypes.show')
            ->assertViewHas('accountType');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_account_type()
    {
        $accountType = AccountType::factory()->create();

        $response = $this->get(route('accountTypes.edit', $accountType));

        $response
            ->assertOk()
            ->assertViewIs('app.accountTypes.edit')
            ->assertViewHas('accountType');
    }

    /**
     * @test
     */
    public function it_updates_the_account_type()
    {
        $accountType = AccountType::factory()->create();

        $status = Status::factory()->create();

        $data = [
            'status_id' => $status->id,
        ];

        $response = $this->put(
            route('accountTypes.update', $accountType),
            $data
        );

        unset($data['status_id']);

        $data['id'] = $accountType->id;

        $this->assertDatabaseHas('account_types', $data);

        $response->assertRedirect(route('accountTypes.edit', $accountType));
    }

    /**
     * @test
     */
    public function it_deletes_the_account_type()
    {
        $accountType = AccountType::factory()->create();

        $response = $this->delete(route('accountTypes.destroy', $accountType));

        $response->assertRedirect(route('accountTypes.index'));

        $this->assertDeleted($accountType);
    }
}
