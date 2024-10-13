@extends('admin.app')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Dashboard
            </h3>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        {{$expenseChart->container()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ $expenseChart->cdn() }}"></script>

{{ $expenseChart->script() }}
@endsection
