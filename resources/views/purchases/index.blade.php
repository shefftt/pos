@extends('layouts.master')
@section('content')
@section('title' ,__('messages.Purchase bills'))

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6> {{ __('messages.Purchase bills') }}</h6>
            </div>
            
            <div class="col text-left">
                <a class="btn btn-dark" href="{{url('/purchase/create')}}" role="button"> {{ __('messages.Create an invoice') }}</a>
            </div>
        </div>

        <div  class="dataTables_filter"><label>بحث : <input type="search"  id="search" class="form-control form-control-sm" placeholder="" aria-controls="example1" name="search"></label>
        </div>
    </div>
    <div class="card-body">
        <table  id="DataTable" class="table">
            <thead>
                <tr>
                    
                    <th>#</th>
                    <th>{{ __('messages.Suppliers') }}</th>
                    <th> {{ __('messages.Storesitem') }}</th>
                    <th> {{ __('messages.Total') }}</th>
                    <th>{{ __('messages.Date') }}</th>
                    <th> {{ __('messages.Payment') }}</th>
                    <th> {{ __('messages.invoice number') }}</th>
                    <th>   {{ __('messages.paymentmethods') }}</th>
                    <th> {{ __('messages.Date') }}</th>
                    <th>{{ __('messages.product Settings') }}</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach($purchases as $purchase)
                <tr>
                    <td scope="row">{{$i++}}</td>
                    <td>{{$purchase->supplier->name}}</td>
                    <td>{{$purchase->stock->name}}</td>
                    <td>{{$purchase->total}}</td>
                    <td>{{$purchase->created_at}}</td>

                    <td>
                        @if($purchase->transaction->sum('amount') == $purchase->total)
                        <button class="btn">
                            تم الدفع <span class="badge badge-primary"></span>
                        </button>
                        @else
                        <?php $amount = $purchase->total - $purchase->transaction->sum('amount'); ?>
                            <a href="{{url('/purchase/payment')}}/{{$purchase->id}}"  type="button" class="btn btn-sm btn-primary">
                                المتبقى <span class="badge badge-light">{{$amount}}</span>
                            </a>
                        @endif
                    </td>

                    <td>{{$purchase->invoice_number}}</td>
                    <td>{{$purchase->payment_method->name}}</td>
                    <td>{{$purchase->created_at}}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{url('/purchase/')}}/{{$purchase->id}}" role="button">{{ __('messages.Show') }}</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

