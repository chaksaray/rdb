<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\PageRole;
use Illuminate\Http\Request;
use App\Http\Requests\PageRoleStoreRequest;
use App\Http\Requests\PageRoleUpdateRequest;

class PageRoleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        $pageRoles = PageRole::search($search)
            ->latest()
            ->paginate();

        return view('app.page_roles.index', compact('pageRoles', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $statuses = Status::pluck('name', 'id');

        return view('app.page_roles.create', compact('statuses'));
    }

    /**
     * @param \App\Http\Requests\PageRoleStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRoleStoreRequest $request)
    {
        $validated = $request->validated();

        $pageRole = PageRole::create($validated);

        return redirect()->route('page-roles.edit', $pageRole);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PageRole $pageRole
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PageRole $pageRole)
    {
        return view('app.page_roles.show', compact('pageRole'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PageRole $pageRole
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PageRole $pageRole)
    {
        $statuses = Status::pluck('name', 'id');

        return view('app.page_roles.edit', compact('pageRole', 'statuses'));
    }

    /**
     * @param \App\Http\Requests\PageRoleUpdateRequest $request
     * @param \App\Models\PageRole $pageRole
     * @return \Illuminate\Http\Response
     */
    public function update(PageRoleUpdateRequest $request, PageRole $pageRole)
    {
        $validated = $request->validated();

        $pageRole->update($validated);

        return redirect()->route('page-roles.edit', $pageRole);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PageRole $pageRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, PageRole $pageRole)
    {
        $pageRole->delete();

        return redirect()->route('page-roles.index');
    }
}
