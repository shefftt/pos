@extends('layouts.master')
@section('content')
@section('title' ,__('messages.Productmovementreport') )


<div class="callout callout-info">
    <form action="{{url('product_report')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">{{ __('messages.Start Date') }} </label>
                    <input type="date" class="form-control" required name="from">

                </div>
                <div class="form-group col-md-6">

                    <label for="">{{ __('messages.Expiry date') }} </label>
                    <input type="date" class="form-control" required name="to">

                </div>
                <div class="form-group col-md-6">
                    <label for="category_id">المنتجات</label>
                    <select class="form-control" name="product_id" id="select-state">
                        <option value=""> اختار منتج</option>
                        @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="stock_id">المخزن</label>
                    <select class="form-control" name="stock_id" id="select-state">
                        <option value="">اختر المخزن</option>
                        @foreach($stocks as $stocks)
                            <option value="{{$stocks->id}}">{{$stocks->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <br>
                    <button class="btn btn-md btn-success btn-block" type="submit" style="margin-top: 0.5rem;">{{ __('messages.Search') }}</button>
                </div>


            </div>
        </div>

    </form>
</div>
<div class="col-1">
    <a class="btn btn-success" onclick="printDiv('invoice')"  role="button">{{ __('messages.Print') }}</a>
</div>
<br>
    <div id="DivIdToPrint" class="invoice p-3 mb-3">
        <div class="card">
            <div class="card-header">
                <div class="row text-center">
                    <div class="col">
                        <img src="{{url('/image/logo.png')}}" class="rounded float-right" alt="logo">
                    </div>
                    <div class="col">
                        <h6>
                              {{ __('messages.Productmovementreport') }}
                        </h6>
                    </div>
                    <div class="col">
                        <img src="{{url('/image/logo.png')}}" class="rounded float-left" alt="logo">
                    </div>
                </div>
            </div>
<div id="DivIdToPrint" class="invoice p-3 mb-3">
    <div  class="card-body">
        <table id="DataTable" class="table">
            <thead>
            <tr>
                <th># </th>
                <th> {{ __('messages.product name') }}</th>
                <th>{{ __('messages.barcode') }}</th>
                <th>{{ __('messages.Total') }}</th>
                <th>{{ __('messages.Tax') }}</th>
                <th>{{ __('messages.total summation') }}</th>
                <th>  {{ __('messages.number of  purchased') }}</th>
            </tr>
            </thead>

            <tbody>
            <?php $i = 1; ?>
            @foreach($products as $sales)
                <tr>
                    <td scope="row">{{$i++}}</td>

                    <td>{{$sales->name}}</td>
                    <td>{{$sales->barcode}}</td>
                    <td>{{$sales->sales->sum('sub_total')}}</td>
                    <td>{{$sales->sales->sum('sub_vat')}}</td>
                    <td>{{$sales->sales->sum('sub_total') + $sales->sales->sum('sub_vat')}}</td>
                    <td>{{$sales->sales->count('id')}}</td>


                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
</div>

<br>
            <br>
            <div id="DivIdToPrint" class="invoice p-3 mb-3">
                <div class="card">
                    <div class="card-header">
                        <div class="row text-center">
                            <div class="col">
                                <img src="{{url('/image/logo.png')}}" class="rounded float-right" alt="logo">
                            </div>
                            <div class="col">
                                <h6>
                                    {{ __('messages.Purchase Movement Report') }}                                 </h6>
                            </div>
                            <div class="col">
                                <img src="{{url('/image/logo.png')}}" class="rounded float-left" alt="logo">
                            </div>
                        </div>
                    </div>
<div id="DivIdToPrint" class="invoice p-3 mb-3">
    <div class="card-body">
        <table id="DataTable" class="table">
            <thead>
            <tr>
                <th># متسلسل</th>
                <th>اسم المنتج</th>
                <th>البراكود</th>
                <th>المجموع</th>
                <th>عدد مرات الشراء</th>
            </tr>
            </thead>

            <tbody>
            <?php $i = 1; ?>
            @foreach($products as $purchase)
                <tr>
                    <td scope="row">{{$i++}}</td>

                    <td>{{$purchase->name}}</td>
                    <td>{{$purchase->barcode}}</td>
                    <td>{{$purchase->purchases->sum('sub_total')}}</td>
                    <td>{{$purchase->purchases->sum('sub_vat')}}</td>
                    <td>{{$purchase->purchases->sum('sub_total') + $purchase->purchases->sum('sub_vat')}}</td>
                    <td>{{$purchase->sales->count('id')}}</td>


                </tr>
            @endforeach


            </tbody>
        </table>

    </div>
</div>

@endsection


