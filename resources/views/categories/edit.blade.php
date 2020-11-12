@extends('layouts.master')
@section('content')
@section('title' ,__('messages.Add a classification'))

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>{{ __('messages.Add a classification') }}</h6>
            </div>

        </div>
    </div>
    <form action="{{url('category/edit')}}" method="post">
        @csrf
        <div class="card-body">
            <input type="hidden" value="{{$category->id}}" name="id">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">{{ __('messages.Category name') }} </label>
                    <input type="text" value="{{$category->name}}" class="form-control @error('name') is-invalid @enderror" name="name">
                    @error('name')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>



                <div class="form-group col-md-6">
                    <label for="sub_id">{{ __('messages.Type of classification') }}</label>
                    <select class="form-control" name="sub_id" id="sub_id">
                        <option value="0">تصنيف رئيسيى</option>
                        @foreach($categories as $categorys)
                        <option @if($category->sub_id ==  $categorys->id) selected @endif value="{{$categorys->id}}">{{$categorys->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-success">{{ __('messages.Modify') }}</button>
        </div>
    </form>
</div>

@endsection
