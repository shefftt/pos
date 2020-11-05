@extends('layouts.master')
@section('content')
@section('title' ,' فاتورة مبيعات ')

        <hr>
<table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>المنتج</th>
                    <th>  الكمية</th>
                    <th>سعر الوحده</th>
                    <th> الوحده</th>
                    <th> الضريبه</th>
                    <th>مجموع الضريبه</th>
                    <th> المجموع</th>

                </tr>
            </thead>
    <div class="col-1">
        <a class="btn btn-success" onclick="window.print();" role="button">طباعه</a>
    </div>
    <br>
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
                    <td>{{$product->product->unit->name}}</td>
                    <td>{{$product->vat}}</td>
                    <td>{{$product->sub_vat}}</td>
                    <td>{{$product->sub_total}}</td>
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
    <div class="card-footer">

    </div>
</div>

@endsection
