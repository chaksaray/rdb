@extends('layouts.app') @section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('report-user-types.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                Show ReportUserType
            </h4>

            <div class="mt-4"></div>

            <div class="mt-4">
                <a
                    href="{{ route('report-user-types.index') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-return-left"></i> Back to Index
                </a>

                <a
                    href="{{ route('report-user-types.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> Create
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
