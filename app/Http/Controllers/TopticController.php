<?php

namespace App\Http\Controllers;

use App\Models\Toptic;
use Illuminate\Http\Request;
use App\Http\Requests\TopticStoreRequest;
use App\Http\Requests\TopticUpdateRequest;

class TopticController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        $toptics = Toptic::search($search)
            ->latest()
            ->paginate();

        return view('app.toptics.index', compact('toptics', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('app.toptics.create');
    }

    /**
     * @param \App\Http\Requests\TopticStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TopticStoreRequest $request)
    {
        $validated = $request->validated();

        $toptic = Toptic::create($validated);

        return redirect()->route('toptics.edit', $toptic);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Toptic $toptic
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Toptic $toptic)
    {
        return view('app.toptics.show', compact('toptic'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Toptic $toptic
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Toptic $toptic)
    {
        return view('app.toptics.edit', compact('toptic'));
    }

    /**
     * @param \App\Http\Requests\TopticUpdateRequest $request
     * @param \App\Models\Toptic $toptic
     * @return \Illuminate\Http\Response
     */
    public function update(TopticUpdateRequest $request, Toptic $toptic)
    {
        $validated = $request->validated();

        $toptic->update($validated);

        return redirect()->route('toptics.edit', $toptic);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Toptic $toptic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Toptic $toptic)
    {
        $toptic->delete();

        return redirect()->route('toptics.index');
    }
}
