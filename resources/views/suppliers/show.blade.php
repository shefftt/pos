@extends('layouts.master')
@section('content')
@section('title' ,'عرض مورد')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="form-group col-md-10">
                <h6>{{$supplier->name}}</h6></div>
            <div class="form-group col-md-2">

<h6  style="
    padding-right: 7rem;
">
                    <a name="" id="" class="btn  btn-sm btn-success" href="{{url('/supplier/payment')}}/{{$supplier->id}}" role="button" >دفع</a>
</h6></div>
            </div>

        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>رقم الفاتورة</th>
                <th>المبلغ</th>
                <th>من حساب </th>
                <th>الي حساب </th>


            </tr>
            </thead>
            <tbody>
            <?php $i =1; ?>
            @foreach($supplier->transaction as $supplier_show)
                <tr>
                    <td scope="row">{{$i++}}</td>
                    <td>{{$supplier_show->transactionable_id}}</td>
                    <td>{{$supplier_show->amount}}</td>
                    <td>{{$supplier_show->from}}</td>
                    <td>{{$supplier_show->to}}</td>


                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <center>
        <div class="card-footer">
            <div class="col-md-4">

            </div>
        </div>
    </center>
</div>

@endsection
