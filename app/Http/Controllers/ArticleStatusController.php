<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticleStatus;
use App\Http\Requests\ArticleStatusStoreRequest;
use App\Http\Requests\ArticleStatusUpdateRequest;

class ArticleStatusController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        $articleStatuses = ArticleStatus::search($search)
            ->latest()
            ->paginate();

        return view(
            'app.article_statuses.index',
            compact('articleStatuses', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('app.article_statuses.create');
    }

    /**
     * @param \App\Http\Requests\ArticleStatusStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleStatusStoreRequest $request)
    {
        $validated = $request->validated();

        $articleStatus = ArticleStatus::create($validated);

        return redirect()->route('article-statuses.edit', $articleStatus);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ArticleStatus $articleStatus
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ArticleStatus $articleStatus)
    {
        return view('app.article_statuses.show', compact('articleStatus'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ArticleStatus $articleStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ArticleStatus $articleStatus)
    {
        return view('app.article_statuses.edit', compact('articleStatus'));
    }

    /**
     * @param \App\Http\Requests\ArticleStatusUpdateRequest $request
     * @param \App\Models\ArticleStatus $articleStatus
     * @return \Illuminate\Http\Response
     */
    public function update(
        ArticleStatusUpdateRequest $request,
        ArticleStatus $articleStatus
    ) {
        $validated = $request->validated();

        $articleStatus->update($validated);

        return redirect()->route('article-statuses.edit', $articleStatus);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ArticleStatus $articleStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ArticleStatus $articleStatus)
    {
        $articleStatus->delete();

        return redirect()->route('article-statuses.index');
    }
}
