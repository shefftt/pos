@extends('layouts.master')
@section('content')
@section('title' ,'المنتجات')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>{{$products->name}}</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th>المخزن</th>
                <th>الكمية</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$products->stock->name}}</td>
                    <td>{{$products->qyt}}</td>

                </tr>

            </tbody>
        </table>
    </div>

</div>

@endsection
