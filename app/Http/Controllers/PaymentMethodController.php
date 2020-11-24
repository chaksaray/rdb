<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Requests\PaymentMethodStoreRequest;
use App\Http\Requests\PaymentMethodUpdateRequest;

class PaymentMethodController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search', '');

        $paymentMethods = PaymentMethod::search($search)
            ->latest()
            ->paginate();

        return view(
            'app.payment_methods.index',
            compact('paymentMethods', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $statuses = Status::pluck('name', 'id');

        return view('app.payment_methods.create', compact('statuses'));
    }

    /**
     * @param \App\Http\Requests\PaymentMethodStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentMethodStoreRequest $request)
    {
        $validated = $request->validated();

        $paymentMethod = PaymentMethod::create($validated);

        return redirect()->route('payment-methods.edit', $paymentMethod);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PaymentMethod $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PaymentMethod $paymentMethod)
    {
        return view('app.payment_methods.show', compact('paymentMethod'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PaymentMethod $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PaymentMethod $paymentMethod)
    {
        $statuses = Status::pluck('name', 'id');

        return view(
            'app.payment_methods.edit',
            compact('paymentMethod', 'statuses')
        );
    }

    /**
     * @param \App\Http\Requests\PaymentMethodUpdateRequest $request
     * @param \App\Models\PaymentMethod $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(
        PaymentMethodUpdateRequest $request,
        PaymentMethod $paymentMethod
    ) {
        $validated = $request->validated();

        $paymentMethod->update($validated);

        return redirect()->route('payment-methods.edit', $paymentMethod);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PaymentMethod $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();

        return redirect()->route('payment-methods.index');
    }
}
