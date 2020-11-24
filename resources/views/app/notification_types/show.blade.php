@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('notification-types.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                Show NotificationType
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>Status</h5>
                    <span
                        >{{ optional($notificationType->status)->name ?? '-'
                        }}</span
                    >
                </div>
                <div class="mb-4">
                    <h5>Follower Id</h5>
                    <span>{{ $notificationType->follower_id ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a
                    href="{{ route('notification-types.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i> Back to Index
                </a>

                <a
                    href="{{ route('notification-types.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> Create
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
