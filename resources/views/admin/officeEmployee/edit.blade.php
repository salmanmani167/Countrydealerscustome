@extends('admin.app')
@section('content')

    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Admin Office Employee Update
            </h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{route('employee.office.update' , $data->id )}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('admin.officeEmployee.fields')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card rounded border mb-2">
                                <div class="card-body p-3">
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="mb-1">Profile Image</h6>
                                            <img src="{{Storage::url($data->image)}}" alt="{{$data->image}}" width="100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card rounded border mb-2">
                                <div class="card-body p-3">
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="mb-1">CNIC Front Image</h6>
                                            <img src="{{Storage::url($data->cnic_front_image)}}" alt="{{$data->image}}" width="100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card rounded border mb-2">
                                <div class="card-body p-3">
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="mb-1">CNIC Back Image</h6>
                                            <img src="{{Storage::url($data->cnic_back_image)}}" alt="{{$data->image}}" width="100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card rounded border mb-2">
                                <div class="card-body p-3">
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="mb-1">Father's CNIC Front Image</h6>
                                            <img src="{{Storage::url($data->father_cnic_front_image)}}" alt="{{$data->image}}" width="100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card rounded border mb-2">
                                <div class="card-body p-3">
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="mb-1">Father's CNIC Back Image</h6>
                                            <img src="{{Storage::url($data->father_cnic_back_image)}}" alt="{{$data->image}}" width="100%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card rounded border mb-2">
                                <div class="card-body p-3">
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="mb-1">CV</h6>
                                            <a href="{{Storage::url($data->cv)}}" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
