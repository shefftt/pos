@extends('layouts.master')
@section('content')
@section('title' ,' تقرير الارباح ')

<div class="callout callout-info">
    <form action="{{url('profits_report')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">من </label>
                    <input type="date" class="form-control" required name="from">

                </div>
                <div class="form-group col-md-6">

                    <label for="">الي </label>
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
                    <br>
                    <button class="btn btn-md btn-success btn-block" type="submit" style="margin-top: 0.5rem;">بحث</button>
                </div>
            </div>
        </div>

    </form>
</div>

{{--<div class="card bg-light">--}}
{{--    <div class="card-header text-muted border-bottom-0">--}}
{{--        سوبـــر ماركت خيرات الطيبين--}}
{{--    </div>--}}
{{--    <div class="card-body pt-0">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-7">--}}
{{--                <h2 class="lead"><b>فاتورة مبيعات</b></h2>--}}
{{--                <p class="text-muted text-sm">فاتوره تفصيليه </p>--}}
{{--            </div>--}}
{{--            <div class="col-5 text-center">--}}
{{--                <img src="https://www.logodesign.net/logo/foods-in-shopping-bad-going-fast-with-thumbs-up-6048ld.png?size=2&industry=supermarket" alt="" class="img-circle img-fluid" height="20%" width="20%">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="col-1">
    <a class="btn btn-success" onclick="printDiv('invoice')"  role="button">طباعه</a>
</div>
<br>
<div id="DivIdToPrint" class="invoice p-3 mb-3">
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th># متسلسل</th>
                <th>المنتج</th>
                <th> الوحده</th>
                <th> الكمية</th>
                <th>سعر البيع</th>
                <th>سعر الشراء</th>
                <th>الربح</th>
            </tr>
            </thead>

            <tbody>
            <?php $i = 1; ?>
            @foreach($sales_profits as $profit)
                <tr>
                    <td scope="row">{{$i++}}</td>
                    <td>{{$profit->product->name}}</td>
                    <td>{{$profit->product->unit->unit_name}}</td>
                    <td>{{$profit->qyt}}</td>
                    <td>{{$profit->product->sale_price}}</td>
                    <td>{{$profit->product->purchase_price}}</td>
                    <td>{{$profit->product->sale_price-$profit->product->purchase_price}}</td>

{{--                    <td>{{$profit->purchase->price}}</td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection


