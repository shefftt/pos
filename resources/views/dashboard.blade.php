@extends('layouts.master')
@section('content')
@section('title' ,'الرئيسيه')
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa fa-gear"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">{{ __('messages.Sales') }}</span>
                <span class="info-box-number">
                     {{ __('messages.number') }}: {{$sales_statistics->count()}}
                    <small>{{ __('messages.Bill') }}</small>
                </span>
                <span class="info-box-number">
                    {{ __('messages.amount') }} : {{$sales_statistics->sum('total')}}
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">{{ __('messages.Purchases') }}</span>
                <span class="info-box-number">
                    {{ __('messages.number') }} : {{$sales_statistics->count()}}
                    <small>{{ __('messages.Bill') }}</small>
                </span>
                <span class="info-box-number">
                    {{ __('messages.amount') }}: {{$sales_statistics->sum('total')}}
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-shopping-cart"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">{{ __('messages.Products') }}</span>
                <span class="info-box-number">
                    {{ __('messages.number') }}: {{$product}}
                    <small>{{ __('messages.Producer') }}</small>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">{{ __('messages.Suppliers') }}</span>
                <span class="info-box-number">

                <span class="info-box-number">
                    {{ __('messages.number') }}: {{$supplier}}
                    <small>{{ __('messages.Supplier') }}</small>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                {{ __('messages.latest procurement process') }}
            </div>
            <div class="card-body">
                <table class="table table-striped ">
                    <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>{{ __('messages.Client') }}</th>
                            <th>{{ __('messages.Total') }}</th>
                            <th>{{ __('messages.Date') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        $total = 0; ?>
                        @foreach($purchase as $invoice)
                        <?php $total +=   $invoice->total; ?>
                        <tr>
                            <td scope="row"><?= $i++ ?></td>
                            <td>{{ $invoice->supplier->name }}</td>
                            <td>{{ $invoice->total }}</td>
                            <td>{{ $invoice->created_at }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-muted">

                <h3>{{ __('messages.Total') }} : {{$total}}</h3>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                {{ __('messages.Latest sales') }}
            </div>
            <div class="card-body">
                <table class="table table-striped ">
                    <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>{{ __('messages.Client') }}</th>
                            <th>{{ __('messages.Total') }}</th>
                            <th>{{ __('messages.Date') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>

                        <?php $i = 1;
                        $total = 0; ?>
                        @foreach($sales as $invoice)
                        <?php $total +=   $invoice->total; ?>
                        <tr>
                            <td scope="row"><?= $i++ ?></td>
                            <td>@if(isset($invoice->customer->name)) {{ $invoice->customer->name }} @else لايوجد @endif</td>
                            <td>{{ $invoice->total }}</td>
                            <td>{{ $invoice->created_at }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-muted">
                <h3> {{ __('messages.Total') }}: {{$total}}</h3>
            </div>
        </div>
    </div>
</div>

@endsection
