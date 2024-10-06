@extends('admin.app')
@section('content')

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Sales Officer
            </h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('sales.officer.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('admin.salesOfficer.fields')
                    <div class="col-md-12">
                        <div class="form-group row">
                            <button class="btn btn-sm btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
