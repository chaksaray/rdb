@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('pages.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                Show Page
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>Category</h5>
                    <span>{{ optional($page->category)->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Status</h5>
                    <span>{{ optional($page->status)->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Name</h5>
                    <span>{{ $page->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Description</h5>
                    <span>{{ $page->description ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Website</h5>
                    <span>{{ $page->website ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Profile</h5>
                    <span>{{ $page->profile ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Cover</h5>
                    <span>{{ $page->cover ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>User Name</h5>
                    <span>{{ $page->user_name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Created By</h5>
                    <span>{{ $page->created_by ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Custom Url</h5>
                    <span>{{ $page->custom_url ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Phone</h5>
                    <span>{{ $page->phone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Email</h5>
                    <span>{{ $page->email ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('pages.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i> Back to Index
                </a>

                <a href="{{ route('pages.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> Create
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
