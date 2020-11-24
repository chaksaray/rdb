<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;
use App\Http\Requests\GenderStoreRequest;
use App\Http\Requests\GenderUpdateRequest;

class GenderController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        $genders = Gender::search($search)
            ->latest()
            ->paginate();

        return view('app.genders.index', compact('genders', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('app.genders.create');
    }

    /**
     * @param \App\Http\Requests\GenderStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(GenderStoreRequest $request)
    {
        $validated = $request->validated();

        $gender = Gender::create($validated);

        return redirect()->route('genders.edit', $gender);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Gender $gender
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Gender $gender)
    {
        return view('app.genders.show', compact('gender'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Gender $gender
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Gender $gender)
    {
        return view('app.genders.edit', compact('gender'));
    }

    /**
     * @param \App\Http\Requests\GenderUpdateRequest $request
     * @param \App\Models\Gender $gender
     * @return \Illuminate\Http\Response
     */
    public function update(GenderUpdateRequest $request, Gender $gender)
    {
        $validated = $request->validated();

        $gender->update($validated);

        return redirect()->route('genders.edit', $gender);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Gender $gender
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Gender $gender)
    {
        $gender->delete();

        return redirect()->route('genders.index');
    }
}
