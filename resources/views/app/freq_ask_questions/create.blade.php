@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('freq-ask-questions.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                Create FreqAskQuestion
            </h4>

            <x-form
                method="POST"
                action="{{ route('freq-ask-questions.store') }}"
                class="mt-4"
            >
                @include('app.freq_ask_questions.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('freq-ask-questions.index') }}"
                        class="btn btn-light"
                    >
                        <i class="icon ion-md-return-left text-primary"></i>
                        Back to Index
                    </a>

                    <button type="submit" class="btn btn-primary float-right">
                        <i class="icon ion-md-save"></i> Create
                    </button>
                </div>
            </x-form>
        </div>
    </div>
</div>
@endsection
