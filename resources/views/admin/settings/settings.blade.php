@extends('admin.app')
@section('content')
    @include('admin.settings.modals.type')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Settings
            </h3>
            <div class="d-flex">
                <a href="javascript:;" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#typeModal">+ New</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="myTable" class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Type</th>
                                        <th>Category Type</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $record)
                                        <tr>
                                            <td>{{ $key += 1 }}</td>
                                            <td>{{ $record->name }}</td>
                                            <td>{{ $record->type_category }}</td>
                                            <td>
                                                <a href="javascript:;" class="btn btn-danger btn-sm"
                                                    onclick="confirmAction('{{ route('type.delete', $record->id) }}')">
                                                    <i class="fas fa-regular fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
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
        let table = new DataTable('#myTable');
    </script>
@endsection
