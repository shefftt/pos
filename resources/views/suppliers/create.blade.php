@extends('layouts.master')
@section('content')
@section('title' ,'اضافة مورد  ')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>  اضافة مورد جديد</h6>
            </div>

        </div>
    </div>
    <form action="{{url('supplier/create')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="row">

                <div class="form-group col-md-6">
                    <label for="">اسم المورد </label>
                    <input type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name">
                    @error('name')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="">هاتف المورد </label>
                    <input type="text" value="{{old('phone')}}" class="form-control @error('phone') is-invalid @enderror" name="phone">
                    @error('phone')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-md-12">
                    <label for="">عنوان المورد </label>
                    <textarea  name="address" class="form-control @error('address') is-invalid @enderror">{{old('address')}}</textarea>
                    @error('address')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>



            </div>
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-success">اضافة</button>
        </div>
    </form>
</div>

@endsection
