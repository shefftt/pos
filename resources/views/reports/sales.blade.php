@extends('layouts.master')
@section('content')
@section('title' ,' تقرير المشتريات ')

<div class="callout callout-info">
<form action="{{url('sales_report')}}" method="post">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-4">
                <label for=""> {{ __('messages.Start Date') }}  </label>
                <input type="date" class="form-control" required   name="from">

            </div>
            <div class="form-group col-md-4">
                <label for="">{{ __('messages.Expiry date') }}   </label>
                <input type="date" class="form-control" required  name="to">
            </div>
            <div class="form-group col-md-4">
                 <label for=""> {{ __('messages.paymentmethods') }}</label>
                <select name="payment_method_id" class="form-control" id="select-state">
                    <option value="">  {{ __('messages.paymentmethods') }}</option>
                    @foreach($payments as $payment)
                        <option value="{{$payment->id}}">{{$payment->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="">{{ __('messages.Client') }}</label>
                <select name="customer_id" class="form-control" id="select-state">
                    <option value=""> {{ __('messages.Client') }}</option>
                    @foreach($customers as $customer)
                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="">{{ __('messages.employees') }}</label>
                <select name="created_by" class="form-control" id="select-state">
                    <option value=""> {{ __('messages.employees') }}</option>
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <br>
                <button class="btn btn-md btn-success btn-block" type="submit">{{ __('messages.Search') }}</button>
            </div>

        </div>
    </div>

</form>
</div>
{{--<div class="card bg-light">--}}
{{--    <div class="card-header text-muted border-bottom-0">--}}
{{--        سوبـــر ماركت خيرات الطيبين--}}
{{--    </div>--}}
{{--    <div class="card-body pt-0">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-7">--}}
{{--                <h2 class="lead"><b>فاتورة مبيعات</b></h2>--}}
{{--                <p class="text-muted text-sm">فاتوره تفصيليه </p>--}}
{{--            </div>--}}
{{--            <div class="col-5 text-center">--}}
{{--                <img src="https://www.logodesign.net/logo/foods-in-shopping-bad-going-fast-with-thumbs-up-6048ld.png?size=2&industry=supermarket" alt="" class="img-circle img-fluid" height="20%" width="20%">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="col-1">
    <a class="btn btn-success" onclick="printDiv('invoice')"  role="button">{{ __('messages.Print') }}</a>
</div>
<br>
<div id="DivIdToPrint" class="invoice p-3 mb-3">
<div class="card-body">
    <table class="table">
        <thead>
        <tr>
            <th># </th>
            <th>{{ __('messages.Client') }}</th>
            <th> {{ __('messages.Total') }}</th>
            <th>  {{ __('messages.paymentmethods') }}</th>
            <th> {{ __('messages.Created by') }}</th>
            <th> {{ __('messages.Date') }}</th>
            <th>{{ __('messages.product Settings') }}</th>
        </tr>
        </thead>

        <tbody>
        <?php $i = 1; ?>
        @foreach($sales_report as $sale)
            <tr>
                <td scope="row">{{$i++}}</td>

                <td>
                    @if(isset($sale->customer->name)){{$sale->customer->name}} @else
                    {{ __('messages.unknown') }}
                    @endif
                </td>
                <td>{{$sale->total}}</td>
                <td>{{$sale->payment->name}}</td>
                <td>{{$sale->user->name}}</td>
                <td>{{$sale->created_at}}</td>

                <td>
                    <a class="btn btn-sm btn-primary" href="{{url('/sales/')}}/{{$sale->id}}" role="button">{{ __('messages.Show') }}</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
<div class="card-footer">
    <span> {{ __('messages.Totals') }}:{{$sales_report->sum('total')}}</span>
</div>
</div>
@endsection


