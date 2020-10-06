@extends('layouts.master')
@section('content')
@section('title' ,' اضافة مستخدم  ')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>اضافة مستخدم جديد</h6>
            </div>

        </div>
    </div>
    <form action="{{url('user/create')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="row">

                <div class="form-group col-md-6">
                    <label for="">اسم المستخدم  </label>
                    <input type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name">
                    @error('name')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="">البريد الالكتروني  </label>
                    <input type="text" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" name="email">
                    @error('email')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-md-12">
                    <label for=""> كلمة السر </label>
                    <textarea  name="password" class="form-control @error('password') is-invalid @enderror">{{old('password')}}</textarea>
                    @error('password')
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
