@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('freq-ask-questions.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                Show FreqAskQuestion
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>Status</h5>
                    <span
                        >{{ optional($freqAskQuestion->status)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>Question</h5>
                    <span>{{ $freqAskQuestion->question ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Answer</h5>
                    <span>{{ $freqAskQuestion->answer ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('freq-ask-questions.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i> Back to Index
                </a>

                <a
                    href="{{ route('freq-ask-questions.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> Create
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
