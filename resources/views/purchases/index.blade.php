@extends('layouts.master')
@section('content')
@section('title' ,'انشاء فاتورة مشتريات')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>فواتير المشتريات</h6>
            </div>
            <div class="col text-left">
                <a class="btn btn-dark" href="{{url('/purchase/create')}}" role="button"> انشاء فاتوره</a>

            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>المورد</th>
                <th> المخزن</th>
                <th> المجموع</th>

                <th>الضبط</th>
            </tr>
            </thead>
            <tbody>
            <?php $i =1; ?>
            @foreach($purchases as $purchase)
                <tr>
                    <td scope="row">{{$i++}}</td>

                    <td>{{$purchase->supplier->name}}</td>
                    <td>{{$purchase->stock->name}}</td>
                    <td>{{$purchase->total}}</td>

                    <td>
                        <a class="btn  btn-sm btn-primary" href="{{url('/purchase/')}}/{{$purchase->id}}" role="button">عرض</a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <center>
        <div class="card-footer">
            <div class="col-md-4">
                {{ $purchases->links() }}
            </div>
        </div>
    </center>
</div>

@endsection
