@extends('layouts.master')
@section('content')
@section('title' ,' تقرير المشتريات ')
<div class="callout callout-info">
<form action="{{url('purchases_report')}}" method="post">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-6">
                <label for="">من  </label>
                <input type="date" class="form-control" required  name="from">

            </div>
            <div class="form-group col-md-6">

                <label for="">الي  </label>
                <input type="date" class="form-control" required  name="to">

            </div>
            <div class="form-group col-md-4">
                <label for="category_id">المورد</label>
                <select class="form-control" name="supplier_id"  id="select-state">
                    <option value="">اختار مورد</option>
                    @foreach($suppliers as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="category_id">طريقه الدفع</label>
                <select class="form-control" name="payment_method_id" id="select-state" >
                    <option value="">اختار طريقه الدفع</option>
                    @foreach($payment_methods as $payment)
                        <option value="{{$payment->id}}">{{$payment->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <br>
                <button class="btn btn-md btn-success btn-block" type="submit"  style="margin-top: 0.5rem;">بحث</button>
            </div>


        </div>
    </div>

</form>
</div>
<div class="col-1">
    <a class="btn btn-success" onclick="printDiv('invoice')"  role="button">طباعه</a>
</div>
<br>

<div id="DivIdToPrint" class="invoice p-3 mb-3">

    <link rel="stylesheet" href="{{asset('dist/css/bootstrap-rtl.min.css?v=1')}}">
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
            <th> طريقه الدفع</th>
            <th> التاريخ</th>
            <th>الضبط</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1; ?>
        @foreach($purchases_report as $purchase)
            <tr>
                <td scope="row">{{$i++}}</td>
                <td>{{$purchase->supplier->name}}</td>
                <td>{{$purchase->stock->name}}</td>
                <td>{{$purchase->total}}</td>
                <td>{{$purchase->created_at}}</td>


                <td>{{$purchase->invoice_number}}</td>
                <td>{{$purchase->payment->name}}</td>
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
</div>

@endsection


