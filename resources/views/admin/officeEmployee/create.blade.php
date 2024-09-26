@extends('admin.app')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Admin Office Employee
            </h3>
        </div>
        @include('admin.officeEmployee.fields')
    </div>
@endsection
