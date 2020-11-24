<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PageStoreRequest;
use App\Http\Requests\PageUpdateRequest;

class PageController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        $pages = Page::search($search)
            ->latest()
            ->paginate();

        return view('app.pages.index', compact('pages', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categories = Category::pluck('title', 'id');
        $statuses = Status::pluck('name', 'id');

        return view('app.pages.create', compact('categories', 'statuses'));
    }

    /**
     * @param \App\Http\Requests\PageStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageStoreRequest $request)
    {
        $validated = $request->validated();

        $page = Page::create($validated);

        return redirect()->route('pages.edit', $page);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Page $page)
    {
        return view('app.pages.show', compact('page'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Page $page)
    {
        $categories = Category::pluck('title', 'id');
        $statuses = Status::pluck('name', 'id');

        return view(
            'app.pages.edit',
            compact('page', 'categories', 'statuses')
        );
    }

    /**
     * @param \App\Http\Requests\PageUpdateRequest $request
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function update(PageUpdateRequest $request, Page $page)
    {
        $validated = $request->validated();

        $page->update($validated);

        return redirect()->route('pages.edit', $page);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Page $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Page $page)
    {
        $page->delete();

        return redirect()->route('pages.index');
    }
}
