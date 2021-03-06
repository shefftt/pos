@extends('layouts.master')
@section('content')
@section('title' ,__('messages.Generalreport') )

{{--<hr>--}}
{{--<table class="table">--}}
{{--    <h4>التقرير العام</h4>--}}
{{--    <thead>--}}
{{--    <tr>--}}
{{--        <th>مجموع صافي المبيعات</th>--}}
{{--        <th>مجموع صافي المشتريات</th>--}}
{{--        <th>مجموع ضريبة المشتريات</th>--}}
{{--        <th>مجموع ضريبة المبيعات</th>--}}
{{--    </tr>--}}
{{--    </thead>--}}
{{--    <tbody>--}}


{{--        <tr>--}}
{{--            <td>{{$sales->sum('total')}}</td>--}}
{{--            <td>{{$purchase->sum('total')}}</td>--}}
{{--        </tr>--}}
{{--    </tbody>--}}
{{--</table>--}}

{{--<hr>--}}
{{--<div class="card-footer">--}}
{{--</div>--}}

{{--</div>--}}

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col text-center">
                <h3>
                    {{ __('messages.Generalreport') }}                </h3>
            </div>
            <div class="col-1">
                <a class="btn btn-secondary" onclick="window.print();" role="button">{{ __('messages.Print') }}</a>
            </div>
        </div>


<form action="{{url('general/report')}}" method="post">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="">  {{ __('messages.Start Date') }}   </label>
                <input type="date" class="form-control"   name="start_date">

            </div>
            <div class="form-group col-md-4">
                <label for="">   {{ __('messages.Expiry date') }}  </label>
                <input type="date" class="form-control"   name="end_date">

            </div>
            <div class="form-group col-md-4">
                <br>
                <button class="btn btn-md btn-success btn-block" type="submit"> {{ __('messages.Search') }}  </button>
            </div>


        </div>
    </div>

</form>


    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$purchase->sum('total')-$purchase_d->sum('sub_vat')}}</h3>

                    <p>   {{ __('messages.Total net purchases') }}  </p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$sales->sum('total')-$sales_d->sum('sub_vat')}}</h3>

                    <p>   {{ __('messages.Total net sales') }}  </p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$sales_d->sum('sub_vat')}}</h3>

                    <p>    {{ __('messages.Total sales tax') }}  </p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$purchase_d->sum('sub_vat')}}</h3>

                    <p>   {{ __('messages.Total purchase tax') }}  </p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>0</h3>

                    <p>   {{ __('messages.Total purchases returned') }}  </p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>0</h3>

                    <p>    {{ __('messages.Total sales returns') }}  </p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{($sales->sum('total')-$sales_d->sum('sub_vat'))-($purchase->sum('total')-$purchase_d->sum('sub_vat'))}}</h3>

                    <p>  {{ __('messages.Net profit') }}  </p>
                </div>
                <div class="icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>0</h3>

                    <p>   {{ __('messages.Total expenses') }}  </p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    function auto_print() {
        window.print()
    }
</script>

@endsection
