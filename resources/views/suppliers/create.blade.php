@extends('layouts.master')
@section('content')
@section('title' , __('messages.AddSuppliers'))

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>  {{ __('messages.AddSuppliers') }}</h6>
            </div>

        </div>
    </div>
    <form action="{{url('supplier/create')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="row">

                <div class="form-group col-md-6">
                    <label for="">{{ __('messages.name') }}  </label>
                    <input type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name">
                    @error('name')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for=""> {{ __('messages.phone') }}  </label>
                    <input type="text" value="{{old('phone')}}" class="form-control @error('phone') is-invalid @enderror" name="phone">
                    @error('phone')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-md-12">
                    <label for=""> {{ __('messages.Title') }} </label>
                    <textarea  name="address" class="form-control @error('address') is-invalid @enderror">{{old('address')}}</textarea>
                    @error('address')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>



            </div>
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-success">{{ __('messages.Add') }}</button>
        </div>
    </form>
</div>

@endsection
