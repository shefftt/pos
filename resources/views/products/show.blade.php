@extends('layouts.master')
@section('content')
@section('title' ,'المنتجات')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>{{$product_name->name}}</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th>{{ __('messages.default store') }}</th>
                <th>{{ __('messages.The opening quantity') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->stock->name}}</td>
                    <td>{{$product->qyt}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
