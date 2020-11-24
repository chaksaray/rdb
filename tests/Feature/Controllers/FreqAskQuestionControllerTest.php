<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\FreqAskQuestion;

use App\Models\Status;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FreqAskQuestionControllerTest extends TestCase
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
    public function it_displays_index_view_with_freq_ask_questions()
    {
        $freqAskQuestions = FreqAskQuestion::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('freqAskQuestions.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.freqAskQuestions.index')
            ->assertViewHas('freqAskQuestions');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_freq_ask_question()
    {
        $response = $this->get(route('freqAskQuestions.create'));

        $response->assertOk()->assertViewIs('app.freqAskQuestions.create');
    }

    /**
     * @test
     */
    public function it_stores_the_freq_ask_question()
    {
        $data = FreqAskQuestion::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('freqAskQuestions.store'), $data);

        $this->assertDatabaseHas('freq_ask_questions', $data);

        $freqAskQuestion = FreqAskQuestion::latest('id')->first();

        $response->assertRedirect(
            route('freqAskQuestions.edit', $freqAskQuestion)
        );
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_freq_ask_question()
    {
        $freqAskQuestion = FreqAskQuestion::factory()->create();

        $response = $this->get(
            route('freqAskQuestions.show', $freqAskQuestion)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.freqAskQuestions.show')
            ->assertViewHas('freqAskQuestion');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_freq_ask_question()
    {
        $freqAskQuestion = FreqAskQuestion::factory()->create();

        $response = $this->get(
            route('freqAskQuestions.edit', $freqAskQuestion)
        );

        $response
            ->assertOk()
            ->assertViewIs('app.freqAskQuestions.edit')
            ->assertViewHas('freqAskQuestion');
    }

    /**
     * @test
     */
    public function it_updates_the_freq_ask_question()
    {
        $freqAskQuestion = FreqAskQuestion::factory()->create();

        $status = Status::factory()->create();

        $data = [
            'question' => $this->faker->text(255),
            'answer' => $this->faker->text,
            'status_id' => $status->id,
        ];

        $response = $this->put(
            route('freqAskQuestions.update', $freqAskQuestion),
            $data
        );

        $data['id'] = $freqAskQuestion->id;

        $this->assertDatabaseHas('freq_ask_questions', $data);

        $response->assertRedirect(
            route('freqAskQuestions.edit', $freqAskQuestion)
        );
    }

    /**
     * @test
     */
    public function it_deletes_the_freq_ask_question()
    {
        $freqAskQuestion = FreqAskQuestion::factory()->create();

        $response = $this->delete(
            route('freqAskQuestions.destroy', $freqAskQuestion)
        );

        $response->assertRedirect(route('freqAskQuestions.index'));

        $this->assertDeleted($freqAskQuestion);
    }
}
