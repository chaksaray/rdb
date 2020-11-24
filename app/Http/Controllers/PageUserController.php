<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Page;
use App\Models\PageUser;
use App\Models\PageRole;
use Illuminate\Http\Request;
use App\Http\Requests\PageUserStoreRequest;
use App\Http\Requests\PageUserUpdateRequest;

class PageUserController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        $pageUsers = PageUser::search($search)
            ->latest()
            ->paginate();

        return view('app.page_users.index', compact('pageUsers', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $users = User::pluck('name', 'id');
        $pages = Page::pluck('name', 'id');
        $pageRoles = PageRole::pluck('title', 'id');

        return view(
            'app.page_users.create',
            compact('users', 'pages', 'pageRoles')
        );
    }

    /**
     * @param \App\Http\Requests\PageUserStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageUserStoreRequest $request)
    {
        $validated = $request->validated();

        $pageUser = PageUser::create($validated);

        return redirect()->route('page-users.edit', $pageUser);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PageUser $pageUser
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PageUser $pageUser)
    {
        return view('app.page_users.show', compact('pageUser'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PageUser $pageUser
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PageUser $pageUser)
    {
        $users = User::pluck('name', 'id');
        $pages = Page::pluck('name', 'id');
        $pageRoles = PageRole::pluck('title', 'id');

        return view(
            'app.page_users.edit',
            compact('pageUser', 'users', 'pages', 'pageRoles')
        );
    }

    /**
     * @param \App\Http\Requests\PageUserUpdateRequest $request
     * @param \App\Models\PageUser $pageUser
     * @return \Illuminate\Http\Response
     */
    public function update(PageUserUpdateRequest $request, PageUser $pageUser)
    {
        $validated = $request->validated();

        $pageUser->update($validated);

        return redirect()->route('page-users.edit', $pageUser);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PageUser $pageUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, PageUser $pageUser)
    {
        $pageUser->delete();

        return redirect()->route('page-users.index');
    }
}
