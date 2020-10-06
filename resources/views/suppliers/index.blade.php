@extends('layouts.master')
@section('content')
@section('title' ,'الموردين')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>الموردين</h6>
            </div>
            <div class="col text-left">
                <a class="btn btn-secondary" href="{{url('/supplier/create')}}" role="button">اضافة مورد </a>

            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>الهاتف </th>
                <th>العنوان </th>

                <th>الضبط</th>
            </tr>
            </thead>
            <tbody>
            <?php $i =1; ?>
            @foreach($suppliers as $supplier)
                <tr>
                    <td scope="row">{{$i++}}</td>
                    <!-- id 	name 	phone 	address -->
                    <td>{{$supplier->name}}</td>
                    <td>{{$supplier->phone}}</td>
                    <td>{{$supplier->address}}</td>

                    <td>
                        <a name="" id="" class="btn  btn-sm btn-primary" href="{{url('/supplier/show')}}/{{$supplier->id}}" role="button">عرض</a>

                        <a name="" id="" class="btn  btn-sm btn-warning" href="{{url('/supplier/edit')}}/{{$supplier->id}}" role="button">تعديل</a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <center>
        <div class="card-footer">
            <div class="col-md-4">
                {{ $suppliers->links() }}
            </div>
        </div>
    </center>
</div>

@endsection
