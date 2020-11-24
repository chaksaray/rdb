@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('payment-methods.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                Show PaymentMethod
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>Status</h5>
                    <span
                        >{{ optional($paymentMethod->status)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>Name</h5>
                    <span>{{ $paymentMethod->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Icon</h5>
                    <span>{{ $paymentMethod->icon ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Description</h5>
                    <span>{{ $paymentMethod->description ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('payment-methods.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i> Back to Index
                </a>

                <a
                    href="{{ route('payment-methods.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> Create
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
