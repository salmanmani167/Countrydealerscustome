@extends('admin.app')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Admin Office Employee
            </h3>
            <a href="{{route('employee.office.create')}}" class="btn btn-sm btn-primary">+ New</a>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="adminOfficeEmployee" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Father Name</th>
                                        <th>CNIC</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $key => $data)
                                    <tr>
                                        <td>{{$key +=1 }}</td>
                                        <td>{{$data->first_name}}</td>
                                        <td>{{$data->last_name}}</td>
                                        <td>{{$data->cnic}}</td>
                                        <td>
                                            <button class="btn btn-outline-primary">View</button>
                                        </td>
                                    </tr>
                                    @empty
                                    <td>No data found.</td>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('bottom-scripts')
    <script>
        let table = new DataTable('#adminOfficeEmployee');
    </script>
@endsection
