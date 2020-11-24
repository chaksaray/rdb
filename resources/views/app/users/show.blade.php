@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('users.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                Show User
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>Account Type</h5>
                    <span>{{ optional($user->accountType)->id ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Gender</h5>
                    <span>{{ optional($user->gender)->title ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Report User Type</h5>
                    <span
                        >{{ optional($user->reportUserType)->title ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>Name</h5>
                    <span>{{ $user->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Email</h5>
                    <span>{{ $user->email ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Phone</h5>
                    <span>{{ $user->phone ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Avatar</h5>
                    <img
                        src="{{ $user->avatar ? \Storage::url($user->avatar) : '' }}"
                        style="object-fit: cover; width: 150px; height: 150px; border: 1px solid #ccc;"
                    />
                </div>
                <div class="mb-4">
                    <h5>Bio</h5>
                    <span>{{ $user->bio ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Is Recieve New Letter</h5>
                    <span>{{ $user->is_recieve_new_letter ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Is Social Notification</h5>
                    <span>{{ $user->is_social_notification ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Is Recieve Email From Followed Author</h5>
                    <span
                        >{{ $user->is_recieve_email_from_followed_author ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>Is Metion Notification</h5>
                    <span>{{ $user->is_metion_notification ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>Is Promotion</h5>
                    <span>{{ $user->is_promotion ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('users.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i> Back to Index
                </a>

                <a href="{{ route('users.create') }}" class="btn btn-light">
                    <i class="icon ion-md-add"></i> Create
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
