<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsLetterType;
use App\Http\Requests\NewsLetterTypeStoreRequest;
use App\Http\Requests\NewsLetterTypeUpdateRequest;

class NewsLetterTypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        $newsLetterTypes = NewsLetterType::search($search)
            ->latest()
            ->paginate();

        return view(
            'app.news_letter_types.index',
            compact('newsLetterTypes', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('app.news_letter_types.create');
    }

    /**
     * @param \App\Http\Requests\NewsLetterTypeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsLetterTypeStoreRequest $request)
    {
        $validated = $request->validated();

        $newsLetterType = NewsLetterType::create($validated);

        return redirect()->route('news-letter-types.edit', $newsLetterType);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\NewsLetterType $newsLetterType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, NewsLetterType $newsLetterType)
    {
        return view('app.news_letter_types.show', compact('newsLetterType'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\NewsLetterType $newsLetterType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, NewsLetterType $newsLetterType)
    {
        return view('app.news_letter_types.edit', compact('newsLetterType'));
    }

    /**
     * @param \App\Http\Requests\NewsLetterTypeUpdateRequest $request
     * @param \App\Models\NewsLetterType $newsLetterType
     * @return \Illuminate\Http\Response
     */
    public function update(
        NewsLetterTypeUpdateRequest $request,
        NewsLetterType $newsLetterType
    ) {
        $validated = $request->validated();

        $newsLetterType->update($validated);

        return redirect()->route('news-letter-types.edit', $newsLetterType);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\NewsLetterType $newsLetterType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, NewsLetterType $newsLetterType)
    {
        $newsLetterType->delete();

        return redirect()->route('news-letter-types.index');
    }
}
