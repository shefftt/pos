@extends('layouts.master')
@section('content')
@section('title' ,' فاتورة مبيعات ')

<hr>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <img src="{{url('/image/logo.png')}}" class="rounded float-right" alt="logo">
            </div>
            <div class="col text-center">
                <h2>{{\App\Model\setting::find(1)->name}}</h2>
                <h6>{{\App\Model\setting::find(1)->address}}</h6>
                <h6>{{\App\Model\setting::find(1)->phone}}</h6>

            </div>
            <div class="col">
                <img src="{{url('/image/logo.png')}}" class="rounded float-left" alt="logo">
            </div>

        </div>
    </div>
</div>
<div class="card text-left">
    <img class="card-img-top" src="holder.js/100px180/" alt="">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>المنتج</th>
                    <th>الكميه</th>
                    <th>سعر الوحده</th>
                    <th> الوحده</th>
                    <th> الضريبه</th>
                    <th>مجموع الضريبه</th>
                    <th> المجموع</th>

                </tr>
            </thead>
            <br>
            <tbody>
                <?php $i = 1; ?>
                @foreach($invoice->products as $product)
                <tr>
                    <td scope="row">{{$i++}}</td>
                    <td>{{$product->product->name}}</td>
                    <td>{{$product->qyt}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->product->unit->name}}</td>
                    <td>{{$product->vat}}</td>
                    <td>{{$product->sub_vat}}</td>
                    <td>{{$product->sub_total + $product->sub_vat }}</td>
                    @endforeach
            </tbody>
        </table>



        <hr>
        <div class="col-md-4 text-right">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td>المجموع</td>
                        <td>{{$invoice->total}} </td>
                    </tr>
                    <tr>
                        <td>الضريبه</td>
                        <td>{{ $invoice->vat_total}}</td>
                    </tr>
                    <tr>
                        <td>المجموع الكلى</td>
                        <td>{{ $invoice->vat_total + $invoice->total}} </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<div class="card-footer">

</div>
</div>

@endsection
