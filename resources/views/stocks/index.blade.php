@extends('layouts.master')
@section('content')
@section('title' ,'المخازن')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>المخازن</h6>
            </div>
            <div class="col text-left">
                <a class="btn btn-secondary" href="{{url('/stock/create')}}" role="button">اضافة مخزن </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>الحالة </th>

                <th>الضبط</th>
            </tr>
            </thead>
            <tbody>
            <?php $i =1; ?>
            @foreach($stocks as $stock)
                <tr>
                    <td scope="row">{{$i++}}</td>

                    <td>{{$stock->name}}</td>
                    <td>{{$stock->status}}</td>

                    <td>
                        <a name="" id="" class="btn  btn-sm btn-primary" href="{{url('/stock/')}}/{{$stock->id}}" role="button">عرض</a>
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
                {{ $stocks->links() }}
            </div>
        </div>
    </center>
</div>

@endsection
