@extends('layouts.master')
@section('content')
@section('title' ,'العملاء')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>العملاء</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>العميل</th>
                <th> رقم الهاتف</th>
                <th>العنوان</th>
                <th>الضبط</th>
            </tr>
            </thead>
            <tbody>
            <?php $i =1; ?>
            @foreach($customers as $customer)
                <tr>
                    <td scope="row">{{$i++}}</td>

                    <td>{{$customer->name}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->address}}</td>
                    <td>
                        <a name="" id="" class="btn  btn-sm btn-primary" href="#" role="button">توقيف</a>
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
                {{$customers->links()}}
            </div>
        </div>
    </center>
</div>

@endsection
