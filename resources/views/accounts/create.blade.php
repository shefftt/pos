@extends('layouts.master')
@section('content')
@section('title' ,' اضافة حساب')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>  اضافة حساب جديد</h6>
            </div>

        </div>
    </div>
    <form action="{{url('account/create')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">اسم الحساب </label>
                    <input type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name">
                    @error('name')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="sub_id"> نوع الحساب</label>
                    <select class="form-control" name="type" id="type">
                        <option value="expenses"> مصروفات</option>
                        <option value="income"> ايرادات</option>
                        <option value="expenses and income"> مصروفات وايرادات</option>

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
