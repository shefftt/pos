@extends('layouts.master')
@section('content')
@section('title' ,'اضافه قسم منصرفات')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>اضافة قسم جديد</h6>
            </div>

        </div>
    </div>
    <!-- customers `name`, `phone`, `address`, `status` -->
    <form action="{{url('expense_category/create')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="">اسم القسم</label>
                    <input type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name">
                    @error('name')
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
