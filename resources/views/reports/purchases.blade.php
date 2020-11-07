@extends('layouts.master')
@section('content')
@section('title' ,' تقرير المشتريات ')
<div class="callout callout-info">
    <form action="{{url('purchases_report')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for=""> {{ __('messages.Start Date') }}</label>
                    <input type="date" class="form-control" required name="from">

                </div>
                <div class="form-group col-md-6">

                    <label for="">{{ __('messages.Expiry date') }} </label>
                    <input type="date" class="form-control" required name="to">

                </div>
                <div class="form-group col-md-4">
                    <label for="category_id">{{ __('messages.Suppliers') }}</label>
                    <select class="form-control" name="supplier_id" id="select-state">
                        <option value=""> {{ __('messages.Suppliers') }}</option>
                        @foreach($suppliers as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="category_id"> {{ __('messages.paymentmethods') }}</label>
                    <select class="form-control" name="payment_method_id" id="select-state">
                        <option value="">  {{ __('messages.paymentmethods') }}</option>
                        @foreach($payment_methods as $payment)
                        <option value="{{$payment->id}}">{{$payment->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <br>
                    <button class="btn btn-md btn-success btn-block" type="submit" style="margin-top: 0.5rem;">{{ __('messages.Search') }}</button>
                </div>


            </div>
        </div>

    </form>
</div>
<div class="col-1">
    <a class="btn btn-success" onclick="printDiv('invoice')" role="button">{{ __('messages.Print') }}</a>
</div>
<br>

@if(isset($purchases_report))
<div id="DivIdToPrint" class="invoice p-3 mb-3">
    <div class="card">
        <div class="card-header">
            <div class="row text-center">
                <div class="col">
                    <img src="{{url('/image/logo.png')}}" class="rounded float-right" alt="logo">
                </div>
                <div class="col">
                    <h2>{{$setting->name}}</h2>
                    <h6>{{$setting->address}}</h6>
                    <h6>{{$setting->phone}}</h6>
                    <h6>{{ __('messages.Procurement report from') }}
                        {{$from}}
                        {{ __('messages.to') }}
                        {{$to}}
                    </h6>
                </div>
                <div class="col">
                    <img src="{{url('/image/logo.png')}}" class="rounded float-left" alt="logo">
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th># </th>
                        <th>{{ __('messages.Suppliers') }}</th>
                        <th> {{ __('messages.Storesitem') }}</th>
                        <th> {{ __('messages.Total') }}</th>
                        <th> {{ __('messages.invoice number') }}</th>
                        <th>  {{ __('messages.paymentmethods') }}</th>
                        <th> {{ __('messages.Date') }}</th>
                        <th>{{ __('messages.product Settings') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>

                    @foreach($purchases_report as $purchase)
                    <tr>
                        <td scope="row">{{$i++}}</td>
                        <td>{{$purchase->supplier->name}}</td>
                        <td>{{$purchase->stock->name}}</td>
                        <td>{{$purchase->total}}</td>

                        <td>{{$purchase->invoice_number}}</td>

                        <td>{{$purchase->payment->name}}</td>
                        <td>{{$purchase->created_at}}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{url('/purchase/')}}/{{$purchase->id}}" role="button">{{ __('messages.Show') }}</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <h3>

                <span> {{ __('messages.Totals') }}:{{$purchases_report->sum('total')}}</span>
            </h3>
        </div>

    </div>
</div>

@endif
@endsection
