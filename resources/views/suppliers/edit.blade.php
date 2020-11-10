@extends('layouts.master')
@section('content')
@section('title' ,' تعديل مورد')

<div class="card">
    <div class="card-header">
        <div class="row">


        </div>
    </div>
    <form action="{{url('supplier/update')}}/{{$supplier->id}}" method="post">
        @csrf
        <div class="card-body">
            <div class="row">

                <div class="form-group col-md-6">
                    <label for=""> {{ __('messages.name') }} </label>
                    <input type="text" value="{{$supplier->name }}" class="form-control @error('name') is-invalid @enderror" name="name" >
                    @error('name')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
            </div>

                <div class="form-group col-md-6">
                    <label for=""> {{ __('messages.phone') }} </label>
                    <input type="text" value="{{$supplier->phone }}" class="form-control @error('phone') is-invalid @enderror" name="phone">
                    @error('phone')
                    <small  class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for=""> رقم اضافى</label>
                    <input type="text" value="{{$supplier->an_other_phone }}" class="form-control @error('an_other_phone') is-invalid @enderror" name="an_other_phone">
                    @error('an_other_phone')
                    <small  class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for=""> {{ __('messages.tax_number') }}  </label>
                    <input type="text"  class="form-control @error('tax_number') is-invalid @enderror"  value="{{$supplier->tax_number }}" name="tax_number">
                    @error('tax_number')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for=""> {{ __('messages.Title') }}  </label>

                    <textarea  name="address" class="form-control @error('address') is-invalid @enderror">{{$supplier->address}}</textarea>
                    @error('address')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                                        <div class="form-group col-md-6">
                    <label for=""> ملاحظات</label>
                    <textarea  name="note" class="form-control @error('note') is-invalid @enderror">{{$supplier->note}}</textarea>
                    @error('note')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>



            </div>
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-success">{{ __('messages.Modify') }} </button>
        </div>
    </form>
</div>

@endsection
