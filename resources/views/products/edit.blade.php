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
                  <label for="vat">الضريبه</label>
                  <select class="form-control" name="vat" id="vat">
                    <option @if($products->vat == 15)  selected="selected"  @endif value="15">شامل</option>
                    <option value="0">غير شامل</option>
                  </select>
                  @error('vat')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="">الكميه </label>
                    <input type="text" value="{{$products->qyt}}" class="form-control" name="qyt">
                </div>
                <div class="form-group col-md-6">
                    <label for="">الباركود </label>
                    <input type="text" value="{{$products->barcode}}" class="form-control" name="barcode">
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
                    <label for="category_id">الوحده</label>
                    <select class="form-control" name="unit_id" id="unit_id">
                        <option value="{{$products->unit_id}}">{{$products->unit->name}}</option>
                        @foreach($units as $unit)
                            <option value="{{$unit->id}}">{{$unit->unit_name}}</option>
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
