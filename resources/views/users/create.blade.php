@extends('layouts.master')
@section('content')
@section('title' ,' اضافة موظف  ')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>  {{ __('messages.Add Users') }}</h6>
            </div>

        </div>
    </div>
    <form action="{{url('user/create')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="row">

                <div class="form-group col-md-12">
                    <label for="">  {{ __('messages.name') }} </label>
                    <input type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name">
                    @error('name')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="">  {{ __('messages.E-mail') }}  </label>
                    <input type="text" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" name="email">
                    @error('email')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for=""> {{ __('messages.password') }}</label>
                    <input type="text" class="form-control @error('password') is-invalid @enderror" name="password">
                    @error('password')
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
