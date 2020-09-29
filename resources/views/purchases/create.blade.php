@extends('layouts.master')
@section('content')
@section('title' ,'اضافة فاتورة ')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6> اضافة فاتورة مشتريات جديدة</h6>
            </div>

        </div>
    </div>
    <form action="{{url('Purchase/create')}}" method="post">
        @csrf
        <div class="card-body">

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="supplier_id">المورد</label>
                    <select class="form-control" name="supplier_id" id="supplier_id">
                        @foreach($suppliers as $supplier)
                        <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                    </select>
                    @error('supplier_id')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="stocks_id">المخزن</label>
                    <select class="form-control" name="stocks_id" id="stocks_id">
                        @foreach($stocks as $stock)
                        <option value="{{$stock->id}}">{{$stock->name}}</option>
                        @endforeach
                    </select>
                    @error('stock_id')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="stocks_id">طريقه الدفع</label>
                    <select class="form-control" name="stocks_id" id="stocks_id">
                        @foreach($stocks as $stock)
                        <option value="{{$stock->id}}">{{$stock->name}}</option>
                        @endforeach
                    </select>
                    @error('stock_id')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="">بحث بالباركود </label>
                    <input type="text" value="{{old('stock_id')}}" class="form-control @error('stock_id') is-invalid @enderror" name="name">
                    @error('stock_id')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group col-md-4">
                    <label for="">بحث بالاسم </label>
                    <input type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name">
                    @error('name')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الصوره</th>
                        <th>اسم المنتج</th>
                        <th>السعر</th>
                        <th>الكميه</th>
                        <th>المجموع</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row"></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td scope="row"></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-success">انشاء</button>
        </div>
    </form>
</div>

@endsection
