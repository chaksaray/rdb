@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('page-users.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                Show PageUser
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>User</h5>
                    <span>{{ optional($pageUser->user)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Page</h5>
                    <span>{{ optional($pageUser->page)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Page Role</h5>
                    <span
                        >{{ optional($pageUser->pageRole)->title ?? '-' }}</span
                    >
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('page-users.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i> Back to Index
                </a>

                <a
                    href="{{ route('page-users.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> Create
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
