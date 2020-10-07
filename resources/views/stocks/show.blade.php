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
        <table class="table">
            <thead>
            <tr>
                <th>#</th>

                <th>المنتج</th>
                <th>الكميه</th>
            </tr>
            </thead>
            <tbody>
            <?php $i =1; ?>
            @foreach($stocks->purchase_invoice_d as $stock)
                <tr>
                    <td scope="row">{{$i++}}</td>

                    <td>{{$stock->product->name}}</td>
                    <td>{{$stock->qyt}}</td>


                </tr>
            @endforeach
            </tbody>
        </table>

</div>

@endsection
