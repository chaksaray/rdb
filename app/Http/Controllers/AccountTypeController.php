<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use Illuminate\Http\Request;
use App\Http\Requests\AccountTypeStoreRequest;
use App\Http\Requests\AccountTypeUpdateRequest;

class AccountTypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        $accountTypes = AccountType::search($search)
            ->latest()
            ->paginate();

        return view(
            'app.account_types.index',
            compact('accountTypes', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('app.account_types.create');
    }

    /**
     * @param \App\Http\Requests\AccountTypeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountTypeStoreRequest $request)
    {
        $validated = $request->validated();

        $accountType = AccountType::create($validated);

        return redirect()->route('account-types.edit', $accountType);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AccountType $accountType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, AccountType $accountType)
    {
        return view('app.account_types.show', compact('accountType'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AccountType $accountType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, AccountType $accountType)
    {
        return view('app.account_types.edit', compact('accountType'));
    }

    /**
     * @param \App\Http\Requests\AccountTypeUpdateRequest $request
     * @param \App\Models\AccountType $accountType
     * @return \Illuminate\Http\Response
     */
    public function update(
        AccountTypeUpdateRequest $request,
        AccountType $accountType
    ) {
        $validated = $request->validated();

        $accountType->update($validated);

        return redirect()->route('account-types.edit', $accountType);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\AccountType $accountType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, AccountType $accountType)
    {
        $accountType->delete();

        return redirect()->route('account-types.index');
    }
}
