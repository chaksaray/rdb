<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Requests\StatusStoreRequest;
use App\Http\Requests\StatusUpdateRequest;

class StatusController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        $statuses = Status::search($search)
            ->latest()
            ->paginate();

        return view('app.statuses.index', compact('statuses', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('app.statuses.create');
    }

    /**
     * @param \App\Http\Requests\StatusStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusStoreRequest $request)
    {
        $validated = $request->validated();

        $status = Status::create($validated);

        return redirect()->route('statuses.edit', $status);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Status $status
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Status $status)
    {
        return view('app.statuses.show', compact('status'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Status $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Status $status)
    {
        return view('app.statuses.edit', compact('status'));
    }

    /**
     * @param \App\Http\Requests\StatusUpdateRequest $request
     * @param \App\Models\Status $status
     * @return \Illuminate\Http\Response
     */
    public function update(StatusUpdateRequest $request, Status $status)
    {
        $validated = $request->validated();

        $status->update($validated);

        return redirect()->route('statuses.edit', $status);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Status $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Status $status)
    {
        $status->delete();

        return redirect()->route('statuses.index');
    }
}
