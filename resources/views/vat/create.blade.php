@extends('layouts.master')
@section('content')
@section('title' ,' اضافة ضريبة')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>اضافة ضريبة جديدة  </h6>
            </div>
        </div>
    </div>
    <form action="{{url('vat/create')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for=""> الضريبة</label>
                    <input type="text" value="{{old('vat')}}" class="form-control @error('vat') is-invalid @enderror" name="vat">
                    @error('vat')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror

                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-success">اضافة</button>
            </div>
        </div>
    </form>
</div>

@endsection
