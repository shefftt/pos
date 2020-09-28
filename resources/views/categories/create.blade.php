@extends('layouts.master')
@section('content')
@section('title' ,'اضافه تصنيف')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>اضافة منتج جديد</h6>
            </div>

        </div>
    </div>
    <form action="{{url('category/create')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">اسم التصنيف</label>
                    <input type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name">
                    @error('name')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>



                <div class="form-group col-md-6">
                    <label for="sub_id">التصنيف الاب</label>
                    <select class="form-control" name="sub_id" id="sub_id">
                        <option value="0">تصنيف رئيسيى</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
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
