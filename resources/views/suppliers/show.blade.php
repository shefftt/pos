@extends('layouts.master')
@section('content')
@section('title' ,'عرض مورد')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>{{$supplier->name}}</h6>
            </div>

        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>رقم الفاتوره  </th>
                <th>المبلغ</th>
                <th>من حساب </th>
                <th>الي حساب </th>


                <th>الضبط</th>
            </tr>
            </thead>
            <tbody>
            <?php $i =1; ?>
            @foreach($suppliers_show as $supplier_show)
                <tr>
                    <td scope="row">{{$i++}}</td>
                    <!-- id 	name 	phone 	address -->
                    <td>{{$supplier_show->transactionable_id}}</td>
                    <td>{{$supplier_show->amount}}</td>
                    <td>{{$supplier_show->from}}</td>
                    <td>{{$supplier_show->from}}</td>


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
