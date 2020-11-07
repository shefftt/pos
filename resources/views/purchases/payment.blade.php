@extends('layouts.master')
@section('content')
@section('title' ,' دفع')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>   {{ __('messages.Pay bill') }}</h6>
            </div>

        </div>
    </div>
    <form action="{{url('/purchase/payment')}}/{{$invoice->id}}" method="post">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">  {{ __('messages.amount') }}</label>
                    <input type="text" value="{{old('amount')}}" class="form-control @error('amount') is-invalid @enderror" name="amount">
                    @error('amount')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div></div>
                <div class="form-group col-md-6">
                    <label for="">  {{ __('messages.remaining amount') }}</label>

                   <?php $amount = $invoice->total - $invoice->transaction->sum('amount'); ?>

                         <span class="badge badge-light">{{$amount}}</span>


                </div>




        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-success">{{ __('messages.Add') }}</button>
        </div>
    </form>
</div>

@endsection
