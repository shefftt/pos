@extends('layouts.master')
@section('content')
@section('title' ,'اضافه وحده')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6> {{ __('messages.Add Units') }} </h6>
            </div>
        </div>
    </div>
    <form action="{{url('unit/create')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="row">
            <div class="form-group col-md-12">
                    <label for=""> {{ __('messages.product Unit') }}</label>
                    <input type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name">
                    @error('name')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror

            </div>
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-success">{{ __('messages.Add') }}</button>
        </div>
        </div>
    </form>
</div>

@endsection
