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
    <form action="{{url('product/create')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="">اسم المنتج</label>
                    <input type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name">
                    @error('name')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                  <label for="vat">الضريبه</label>
                  <select class="form-control  @error('vat') is-invalid @enderror" name="vat" id="vat">
                    <option value="15">شامل</option>
                    <option value="0">غير شامل</option>
                  </select>
                  @error('vat')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <div class="form-group col-md-6">
                    <label for="">باركود المنتج</label>
                    <input type="text" value="{{old('barcode')}}" class="form-control @error('barcode') is-invalid @enderror" name="barcode">
                    @error('barcode')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="">الكميه الافتتاحيه</label>
                    <input type="text" value="{{old('qyt')}}" class="form-control @error('qyt') is-invalid @enderror" name="qyt">
                    @error('qyt')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="">سعر البيع</label>
                    <input type="text" value="{{old('sale_price')}}" class="form-control @error('sale_price') is-invalid @enderror" name="sale_price">
                    @error('sale_price')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="">سعر الشراء</label>
                    <input type="text" value="{{old('purchase_price')}}" class="form-control  @error('purchase_price') is-invalid @enderror" name="purchase_price">
                    @error('purchase_price')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
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
                    <select class="form-control" name="unit_id" id="unit">
                        @foreach($units as $unit)
                            <option value="{{$unit->id}}">{{$unit->name}}</option>
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
            <button type="submit" class="btn btn-success">اضافة</button>
        </div>
    </form>
</div>

@endsection
