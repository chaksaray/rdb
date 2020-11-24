<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportArticleType;
use App\Http\Requests\ReportArticleTypeStoreRequest;
use App\Http\Requests\ReportArticleTypeUpdateRequest;

class ReportArticleTypeController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        $reportArticleTypes = ReportArticleType::search($search)
            ->latest()
            ->paginate();

        return view(
            'app.report_article_types.index',
            compact('reportArticleTypes', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('app.report_article_types.create');
    }

    /**
     * @param \App\Http\Requests\ReportArticleTypeStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReportArticleTypeStoreRequest $request)
    {
        $validated = $request->validated();

        $reportArticleType = ReportArticleType::create($validated);

        return redirect()->route(
            'report-article-types.edit',
            $reportArticleType
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ReportArticleType $reportArticleType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ReportArticleType $reportArticleType)
    {
        return view(
            'app.report_article_types.show',
            compact('reportArticleType')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ReportArticleType $reportArticleType
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ReportArticleType $reportArticleType)
    {
        return view(
            'app.report_article_types.edit',
            compact('reportArticleType')
        );
    }

    /**
     * @param \App\Http\Requests\ReportArticleTypeUpdateRequest $request
     * @param \App\Models\ReportArticleType $reportArticleType
     * @return \Illuminate\Http\Response
     */
    public function update(
        ReportArticleTypeUpdateRequest $request,
        ReportArticleType $reportArticleType
    ) {
        $validated = $request->validated();

        $reportArticleType->update($validated);

        return redirect()->route(
            'report-article-types.edit',
            $reportArticleType
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\ReportArticleType $reportArticleType
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Request $request,
        ReportArticleType $reportArticleType
    ) {
        $reportArticleType->delete();

        return redirect()->route('report-article-types.index');
    }
}
