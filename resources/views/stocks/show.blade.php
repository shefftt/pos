@extends('layouts.master')
@section('content')
@section('title' ,'المخازن')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <div class="col">
                    <h6>{{$stocks->name}}</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table  id="DataTable" class="table">
            <thead>
            <tr>
                <th>#</th>

                <th>{{ __('messages.product name') }}</th>
                <th>{{ __('messages.Quantity') }}</th>
            </tr>
            </thead>
            <tbody>
            <?php $i =1; ?>
            @foreach($stocks->stock_product as $stock_product)
                <tr>
                    <td scope="row">{{$i++}}</td>

                    <td>{{$stock_product->product->name}}</td>
                    <td>{{$stock_product->qyt}}</td>


                </tr>
            @endforeach
            </tbody>
        </table>

</div>

@endsection
