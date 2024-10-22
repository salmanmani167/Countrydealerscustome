@extends('admin.app')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Dashboard
            </h3>
        </div>
        <div class="row grid-margin">
            <div class="col-12">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-hourglass-half mr-2"></i>
                          Expenses Count
                        </p>
                        <h2>{{$expensesCount}}</h2>
                        <label class="badge badge-outline-danger badge-pill">30% decrease</label>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-check-circle mr-2"></i>
                          Purchase Count
                        </p>
                        <h2>{{$purchasesCount}}</h2>
                        <label class="badge badge-outline-success badge-pill">57% increase</label>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-chart-line mr-2"></i>
                          Sales Count
                        </p>
                        <h2>{{$salesCount}}</h2>
                        <label class="badge badge-outline-success badge-pill">10% increase</label>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        {{$expenseChart->container()}}
                    </div>
                    <div class="col-md-6">
                        {{$purchaseChart->container()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ $expenseChart->cdn() }}"></script>
    <script src="{{ $purchaseChart->cdn() }}"></script>

{{ $expenseChart->script() }}
{{ $purchaseChart->script() }}
@endsection
