@extends('layouts.master')
@section('content')
@section('title' ,'العملاء')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>العملاء</h6>
            </div>
            <div class="col text-left">
                <a class="btn btn-secondary" href="{{url('/customer/create')}}" role="button">اضافة عميل</a>

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
                    <th>الحاله</th>
                    <th>الضبط</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach($customers as $customer)
                <tr>
                    <td scope="row">{{$i++}}</td>

                    <td>{{$customer->name}}</td>
                    <td>{{$customer->phone}}</td>
                    <td>{{$customer->address}}</td>
                    <td>
                        @if($customer->status==false)

                        <span class="label badge label-sm label-danger">
                            تم الايقاف
                        </span>

                        @else
                        <span class="label badge label-sm label-success">
                            نشط
                        </span>
                        @endif
                    </td>
                    <td>
                        <a name="" id="" class="btn  btn-sm btn-primary" href="{{url('customer/toggleStatus')}}/{{$customer->id}}" role="button">توقيف</a>
                        <a name="" id="" class="btn  btn-sm btn-warning" href="#" role="button">عرض</a>

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
