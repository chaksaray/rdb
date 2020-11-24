<?php

namespace App\Http\Controllers;

use App\Models\BackUser;
use Illuminate\Http\Request;
use App\Models\BackUserRole;
use App\Http\Requests\BackUserStoreRequest;
use App\Http\Requests\BackUserUpdateRequest;

class BackUserController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        $backUsers = BackUser::search($search)
            ->latest()
            ->paginate();

        return view('app.back_users.index', compact('backUsers', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $backUserRoles = BackUserRole::pluck('id', 'id');

        return view('app.back_users.create', compact('backUserRoles'));
    }

    /**
     * @param \App\Http\Requests\BackUserStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BackUserStoreRequest $request)
    {
        $validated = $request->validated();

        $backUser = BackUser::create($validated);

        return redirect()->route('back-users.edit', $backUser);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BackUser $backUser
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BackUser $backUser)
    {
        return view('app.back_users.show', compact('backUser'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BackUser $backUser
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, BackUser $backUser)
    {
        $backUserRoles = BackUserRole::pluck('id', 'id');

        return view(
            'app.back_users.edit',
            compact('backUser', 'backUserRoles')
        );
    }

    /**
     * @param \App\Http\Requests\BackUserUpdateRequest $request
     * @param \App\Models\BackUser $backUser
     * @return \Illuminate\Http\Response
     */
    public function update(BackUserUpdateRequest $request, BackUser $backUser)
    {
        $validated = $request->validated();

        $backUser->update($validated);

        return redirect()->route('back-users.edit', $backUser);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BackUser $backUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, BackUser $backUser)
    {
        $backUser->delete();

        return redirect()->route('back-users.index');
    }
}
