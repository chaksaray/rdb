<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Models\FreqAskQuestion;
use App\Http\Requests\FreqAskQuestionStoreRequest;
use App\Http\Requests\FreqAskQuestionUpdateRequest;

class FreqAskQuestionController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        $freqAskQuestions = FreqAskQuestion::search($search)
            ->latest()
            ->paginate();

        return view(
            'app.freq_ask_questions.index',
            compact('freqAskQuestions', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $statuses = Status::pluck('name', 'id');

        return view('app.freq_ask_questions.create', compact('statuses'));
    }

    /**
     * @param \App\Http\Requests\FreqAskQuestionStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FreqAskQuestionStoreRequest $request)
    {
        $validated = $request->validated();

        $freqAskQuestion = FreqAskQuestion::create($validated);

        return redirect()->route('freq-ask-questions.edit', $freqAskQuestion);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FreqAskQuestion $freqAskQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, FreqAskQuestion $freqAskQuestion)
    {
        return view('app.freq_ask_questions.show', compact('freqAskQuestion'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FreqAskQuestion $freqAskQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, FreqAskQuestion $freqAskQuestion)
    {
        $statuses = Status::pluck('name', 'id');

        return view(
            'app.freq_ask_questions.edit',
            compact('freqAskQuestion', 'statuses')
        );
    }

    /**
     * @param \App\Http\Requests\FreqAskQuestionUpdateRequest $request
     * @param \App\Models\FreqAskQuestion $freqAskQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(
        FreqAskQuestionUpdateRequest $request,
        FreqAskQuestion $freqAskQuestion
    ) {
        $validated = $request->validated();

        $freqAskQuestion->update($validated);

        return redirect()->route('freq-ask-questions.edit', $freqAskQuestion);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\FreqAskQuestion $freqAskQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, FreqAskQuestion $freqAskQuestion)
    {
        $freqAskQuestion->delete();

        return redirect()->route('freq-ask-questions.index');
    }
}
