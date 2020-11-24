@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('back-user-roles.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                Create BackUserRole
            </h4>

            <x-form
                method="POST"
                action="{{ route('back-user-roles.store') }}"
                class="mt-4"
            >
                @include('app.back_user_roles.form-inputs')

                <div class="mt-4">
                    <a
                        href="{{ route('back-user-roles.index') }}"
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
