<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gender;
use App\Models\AccountType;
use Illuminate\Http\Request;
use App\Models\ReportUserType;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        $users = User::search($search)
            ->latest()
            ->paginate();

        return view('app.users.index', compact('users', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $accountTypes = AccountType::pluck('id', 'id');
        $genders = Gender::pluck('title', 'id');
        $reportUserTypes = ReportUserType::pluck('title', 'id');

        return view(
            'app.users.create',
            compact('accountTypes', 'genders', 'reportUserTypes')
        );
    }

    /**
     * @param \App\Http\Requests\UserStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('public');
        }

        $user = User::create($validated);

        return redirect()->route('users.edit', $user);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        return view('app.users.show', compact('user'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user)
    {
        $accountTypes = AccountType::pluck('id', 'id');
        $genders = Gender::pluck('title', 'id');
        $reportUserTypes = ReportUserType::pluck('title', 'id');

        return view(
            'app.users.edit',
            compact('user', 'accountTypes', 'genders', 'reportUserTypes')
        );
    }

    /**
     * @param \App\Http\Requests\UserUpdateRequest $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $validated = $request->validated();

        if (empty($validated['password'])) {
            unset($validated['password']);
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }

            $validated['avatar'] = $request->file('avatar')->store('public');
        }

        $user->update($validated);

        return redirect()->route('users.edit', $user);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        if ($user->avatar) {
            Storage::delete($user->avatar);
        }

        $user->delete();

        return redirect()->route('users.index');
    }
}
