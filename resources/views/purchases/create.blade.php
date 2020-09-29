@extends('layouts.master')
@section('content')
@section('title' ,'اضافة فاتورة  ')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>    اضافة فاتورة جديدة</h6>
            </div>

        </div>
    </div>
    <form action="{{url('Purchase/create')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="">المورد  </label>
                    <input type="text" value="{{old('supplier_id')}}" class="form-control @error('supplier_id') is-invalid @enderror" name="name">
                    @error('supplier_id')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="">المخزن  </label>
                    <input type="text" value="{{old('stock_id')}}" class="form-control @error('stock_id') is-invalid @enderror" name="name">
                    @error('stock_id')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="">الدفع  </label>
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
