<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportUserType;
use App\Http\Requests\ReportUserTypeStoreRequest;
use App\Http\Requests\ReportUserTypeUpdateRequest;

class ReportUserTypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        $reportUserTypes = ReportUserType::search($search)
            ->latest()
            ->paginate();

        return view(
            'app.report_user_types.index',
            compact('reportUserTypes', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('app.report_user_types.create');
    }

    /**
     * @param \App\Http\Requests\ReportUserTypeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReportUserTypeStoreRequest $request)
    {
        $validated = $request->validated();

        $reportUserType = ReportUserType::create($validated);

        return redirect()->route('report-user-types.edit', $reportUserType);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ReportUserType $reportUserType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ReportUserType $reportUserType)
    {
        return view('app.report_user_types.show', compact('reportUserType'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ReportUserType $reportUserType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ReportUserType $reportUserType)
    {
        return view('app.report_user_types.edit', compact('reportUserType'));
    }

    /**
     * @param \App\Http\Requests\ReportUserTypeUpdateRequest $request
     * @param \App\Models\ReportUserType $reportUserType
     * @return \Illuminate\Http\Response
     */
    public function update(
        ReportUserTypeUpdateRequest $request,
        ReportUserType $reportUserType
    ) {
        $validated = $request->validated();

        $reportUserType->update($validated);

        return redirect()->route('report-user-types.edit', $reportUserType);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ReportUserType $reportUserType
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ReportUserType $reportUserType)
    {
        $reportUserType->delete();

        return redirect()->route('report-user-types.index');
    }
}
