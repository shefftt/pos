@extends('layouts.master')
@section('content')
@section('title' , __('messages.Add New Product') )

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6> {{ __('messages.Add New Product') }} </h6>
            </div>

        </div>
    </div>
    <form action="{{url('/product/edit/')}}/{{$products->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="">{{ __('messages.product name') }}</label>
                    <input type="text"  value="{{$products->name}}" class="form-control" name="name">

                </div>


                <div class="form-group col-md-6">
                    <label for="">{{ __('messages.The opening quantity') }} </label>
                    <input type="text" value="{{$products->qyt}}" class="form-control" name="qyt">
                </div>
                <div class="form-group col-md-6">
                    <label for="">{{ __('messages.barcode') }} </label>
                    <input type="text" value="{{$products->barcode}}" class="form-control" name="barcode">
                </div>
                <div class="form-group col-md-6">
                    <label for=""> {{ __('messages.selling price') }}</label>
                    <input type="text" value="{{$products->sale_price}}" class="form-control" name="sale_price">
                </div>
                <div class="form-group col-md-6">
                    <label for=""> {{ __('messages.Purchasing price') }}</label>
                    <input type="text" value="{{$products->purchase_price}}" class="form-control" name="purchase_price">

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
                    <select class="form-control" name="unit_id" id="unit_id">
                        <option value="{{$products->unit_id}}">{{$products->unit->name}}</option>
                        @foreach($units as $unit)
                            <option value="{{$unit->id}}">{{$unit->unit_name}}</option>
                        @endforeach
                    </select>
                </div>



        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-success">{{ __('messages.Edit') }}</button>
        </div>
    </form>
</div>

@endsection
