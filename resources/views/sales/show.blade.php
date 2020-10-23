@extends('layouts.master')
@section('content')
@section('title' ,' فاتورة مبيعات ')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col text-center">
                <h3>فاتوره مبيعات
                    #{{$invoice->id}}
                </h3>
            </div>
            <div class="col-1">
                <a class="btn btn-dark" href="#" role="button">طباعه</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="col-md-4">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>العميل</td>
                        <td> @if(isset($invoice->customer->name)){{$invoice->customer->name}} @else
                            غير معروف
                            @endif</td>
                    </tr>
                    <tr>
                        <td> التاريخ</td>
                        <td>{{$invoice->created_at}} </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <hr>
        <table  id="DataTable" class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>المنتج</th>
                    <th> سعر الوحده</th>
                    <th> المجموع</th>
                    <th> الضربيه</th>
                    <th>مجموع الضريبه</th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                $vat_total = 0; ?>
                @foreach($invoice->products as $product)
                <?php $vat_total += $product->sub_vat; ?>
                <tr>
                    <td scope="row">{{$i++}}</td>
                    <td>{{$product->product->name}}</td>
                    <td>{{$product->qyt}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->sub_total}}</td>
                    <td>{{$product->vat}}</td>
                    <td>{{$product->sub_vat}}</td>
                    @endforeach
            </tbody>
        </table>



        <hr>
        <div class="col-md-4">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>المجموع</td>
                        <td>{{$invoice->total}} </td>
                    </tr>
                    <tr>
                        <td>الضريبه</td>
                        <td>{{ $vat_total}}</td>
                    </tr>
                    <tr>
                        <td>المجموع الكلى</td>
                        <td>{{$vat_total + ($invoice->total)}} </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">

    </div>
</div>

@endsection
