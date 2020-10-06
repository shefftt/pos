@extends('layouts.master')
@section('content')
@section('title' ,'اضافه منتج')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>اضافة منتج جديد</h6>
            </div>

        </div>
    </div>
    <form action="{{url('/product/edit/')}}/{{$products->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">اسم المنتج</label>
                    <input type="text"  value="{{$products->name}}" class="form-control" name="name">

                </div>
                <div class="form-group col-md-6">
                    <label for="">الكميه الافتتاحيه</label>
                    <input type="text" value="{{$products->qyt}}" class="form-control" name="qyt">
                </div>
                <div class="form-group col-md-6">
                    <label for="">سعر البيع</label>
                    <input type="text" value="{{$products->sale_price}}" class="form-control" name="sale_price">
                </div>
                <div class="form-group col-md-6">
                    <label for="">سعر الشراء</label>
                    <input type="text" value="{{$products->purchase_price}}" class="form-control" name="purchase_price">

                </div>


                <div class="form-group col-md-6">
                    <label for="category_id">التصنيف</label>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="stock_id">المخزن الافتراضى</label>
                    <select class="form-control" name="stock_id" id="stock_id">
                        @foreach($stocks as $stock)
                            <option value="{{$stock->id}}">{{$stock->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-success">تعديل</button>
        </div>
    </form>
</div>

@endsection
