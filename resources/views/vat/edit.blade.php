@extends('layouts.master')
@section('content')
@section('title' ,'  الضريبة')

<div class="card">
    <div class="card-header">
        <div class="row">

        </div>
    </div>
    <form action="{{url('vat/update')}}/{{$vat->id}}" method="post">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for=""> الضريبة</label>
                    <input type="text" value="{{$vat->vat}}" class="form-control @error('vat') is-invalid @enderror" name="vat">
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
