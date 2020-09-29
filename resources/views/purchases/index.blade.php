@extends('layouts.master')
@section('content')
@section('title' ,'المشتريات')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>فواتير المشتريات</h6>
            </div>
            <div class="col text-left">
                <a class="btn btn-secondary" href="{{url('/Purchase/create')}}" role="button"> اضافة فاتوره</a>

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
            @foreach($purchases as $purchases)
                <tr>
                    <td scope="row">{{$i++}}</td>

                    <td>{{$product->supplier_id}}</td>
                    <td>{{$product->stock_id}}</td>
                    <td>{{$product->total}}</td>

                    <td>
                        <a name="" id="" class="btn  btn-sm btn-primary" href="#" role="button">عرض</a>
                        <a name="" id="" class="btn  btn-sm btn-danger" href="#" role="button">ايقاف</a>
                        <a name="" id="" class="btn  btn-sm btn-warning" href="#" role="button">تعديل</a>

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
