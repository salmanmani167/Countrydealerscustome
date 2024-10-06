@extends('admin.app')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Admin Office Employee
            </h3>
            <div class="d-flex justify-content-center align-items-center">
                <select class="form-control mx-1" id="employee_type">
                    <option disabled selected>-- Filter Employees --</option>
                    @foreach (config('vars.employee_type') as $employeeType)
                        <option value="{{ $employeeType }}">
                            {{ $employeeType }}
                        </option>
                    @endforeach
                </select>
                <a href="{{ route('employee.office.create') }}" class="btn btn-sm btn-primary">+ New</a>
            </div>
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
                                        <th>Employee Type</th>
                                        <th>CNIC</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $key => $data)
                                        <tr>
                                            <td>{{ $key += 1 }}</td>
                                            <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                                            <td>{{ $data->father_name }}</td>
                                            <td>{{ $data->employee_type }}</td>
                                            <td>{{ $data->cnic }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('employee.office.show', $data->id) }}"
                                                        class="btn btn-sm btn-outline-primary"><i
                                                            class="fa-regular fa-eye"></i></a>
                                                    <a href="{{ route('employee.office.edit', $data->id) }}"
                                                        class="btn btn-sm btn-outline-warning mx-1"><i
                                                            class="fa-solid fa-pencil"></i></a>
                                                    <form id="delete-form"
                                                        action="{{ route('employee.office.delete', $data->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" onclick="confirmDelete()"
                                                            class="btn btn-sm btn-danger">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
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
        $('#employee_type').on('change', function() {
            var selectedValue = $(this).val();
            table.search(selectedValue).draw();
        });
    </script>
@endsection
