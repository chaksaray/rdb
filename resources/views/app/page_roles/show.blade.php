@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('page-roles.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                Show PageRole
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>Status</h5>
                    <span>{{ optional($pageRole->status)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Title</h5>
                    <span>{{ $pageRole->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Description</h5>
                    <span>{{ $pageRole->description ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('page-roles.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i> Back to Index
                </a>

                <a
                    href="{{ route('page-roles.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> Create
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
