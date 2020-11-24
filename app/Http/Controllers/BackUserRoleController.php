<?php

namespace App\Http\Controllers;

use App\Models\BackUserRole;
use Illuminate\Http\Request;
use App\Http\Requests\BackUserRoleStoreRequest;
use App\Http\Requests\BackUserRoleUpdateRequest;

class BackUserRoleController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        $backUserRoles = BackUserRole::search($search)
            ->latest()
            ->paginate();

        return view(
            'app.back_user_roles.index',
            compact('backUserRoles', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('app.back_user_roles.create');
    }

    /**
     * @param \App\Http\Requests\BackUserRoleStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BackUserRoleStoreRequest $request)
    {
        $validated = $request->validated();

        $backUserRole = BackUserRole::create($validated);

        return redirect()->route('back-user-roles.edit', $backUserRole);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BackUserRole $backUserRole
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, BackUserRole $backUserRole)
    {
        return view('app.back_user_roles.show', compact('backUserRole'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BackUserRole $backUserRole
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, BackUserRole $backUserRole)
    {
        return view('app.back_user_roles.edit', compact('backUserRole'));
    }

    /**
     * @param \App\Http\Requests\BackUserRoleUpdateRequest $request
     * @param \App\Models\BackUserRole $backUserRole
     * @return \Illuminate\Http\Response
     */
    public function update(
        BackUserRoleUpdateRequest $request,
        BackUserRole $backUserRole
    ) {
        $validated = $request->validated();

        $backUserRole->update($validated);

        return redirect()->route('back-user-roles.edit', $backUserRole);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BackUserRole $backUserRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, BackUserRole $backUserRole)
    {
        $backUserRole->delete();

        return redirect()->route('back-user-roles.index');
    }
}
