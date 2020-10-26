@extends('layouts.master')
@section('content')
@section('title' ,' تقرير المشتريات ')

<form action="{{url('report')}}" method="post">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="">من  </label>
                <input type="date" class="form-control"   name="from">

            </div>
            <div class="form-group col-md-4">
                <label for="">الي  </label>
                <input type="date" class="form-control"   name="to">

            </div>
            <div class="form-group col-md-4">
                <br>
                <button class="btn btn-md btn-success btn-block" type="submit">بحث</button>
            </div>


        </div>
    </div>

</form>


<div class="card-body">
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>المورد</th>
            <th> المخزن</th>
            <th> المجموع</th>
            <th>التاريخ</th>

            <th> رقم الفاتوره</th>
            <th> التاريخ</th>
            <th>الضبط</th>
        </tr>
        </thead>
        <div class="col-1">
            <a class="btn btn-success" onclick="window.print();" role="button">طباعه</a>
        </div>
        <tbody>
        <?php $i = 1; ?>
        @foreach($purchases_report as $purchase)
            <tr>
                <td scope="row">{{$i++}}</td>
                <td>{{$purchase->supplier_id}}</td>
                <td>{{$purchase->stock_id}}</td>
                <td>{{$purchase->total}}</td>
                <td>{{$purchase->created_at}}</td>


                <td>{{$purchase->invoice_number}}</td>
                <td>{{$purchase->created_at}}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{url('/purchase/')}}/{{$purchase->id}}" role="button">عرض</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="card-footer">
    <span> الاجمالي:{{$purchases_report->sum('total')}}</span>
</div>
@endsection

