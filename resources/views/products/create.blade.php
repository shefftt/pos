@extends('layouts.master')
@section('content')
@section('title' , __('messages.Add New Product')  )

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>{{ __('messages.Add New Product') }}</h6>
            </div>

        </div>
    </div>
    <form action="{{url('product/create')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="">{{ __('messages.product name') }}</label>
                    <input type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name">
                    @error('name')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                  <label for="vat">{{ __('messages.Tax') }}</label>
                  <select class="form-control  @error('vat') is-invalid @enderror" name="vat" id="vat">
                    <option value="15">{{ __('messages.Taxes included') }}</option>
                    <option value="0">{{ __('messages.Not including tax') }}</option>
                  </select>
                  @error('vat')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <div class="form-group col-md-6">
                    <label for="">{{ __('messages.barcode') }}</label>
                    <input type="text" value="{{old('barcode')}}" class="form-control @error('barcode') is-invalid @enderror" name="barcode">
                    @error('barcode')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="">{{ __('messages.The opening quantity') }}</label>
                    <input type="text" value="{{old('qyt')}}" class="form-control @error('qyt') is-invalid @enderror" name="qyt">
                    @error('qyt')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="">{{ __('messages.selling price') }}</label>
                    <input type="text" value="{{old('sale_price')}}" class="form-control @error('sale_price') is-invalid @enderror" name="sale_price">
                    @error('sale_price')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="">{{ __('messages.Purchasing price') }}</label>
                    <input type="text" value="{{old('purchase_price')}}" class="form-control  @error('purchase_price') is-invalid @enderror" name="purchase_price">
                    @error('purchase_price')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <div class="form-group col-md-6">
                    <label for="category_id">{{ __('messages.Category') }}</label>
                    <select class="form-control" name="category_id" id="category_id">
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="category_id">{{ __('messages.product Unit') }}</label>
                    <select class="form-control" name="unit_id" id="unit">
                        @foreach($units as $unit)
                            <option value="{{$unit->id}}">{{$unit->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="stock_id">{{ __('messages.default store') }}</label>
                    <select class="form-control" name="stock_id" id="stock_id">
                        @foreach($stocks as $stock)
                        <option value="{{$stock->id}}">{{$stock->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-success">{{ __('messages.Add') }}</button>
        </div>
    </form>
</div>

@endsection
