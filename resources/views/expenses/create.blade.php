@extends('layouts.master')
@section('content')
@section('title' ,'اضافه منصرف ')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>اضافة منصرف</h6>
            </div>

        </div>
    </div>
    <!-- customers `name`, `phone`, `address`, `status` -->
    <form action="{{url('expense/create')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="expense_category_id">قسم المنصرف</label>
                    <select class="form-control" name="expense_category_id" id="expense_category_id">
                        @foreach($expense_categories as $expense_category)
                            <option value="{{$expense_category->id}}">{{$expense_category->name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group col-md-6">
                    <label for="stock_id">المخزن</label>
                    <select class="form-control" name="stock_id" id="stock_id">
                        @foreach($stocks as $stock)
                            <option value="{{$stock->id}}">{{$stock->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="account_id">الحساب</label>
                    <select class="form-control" name="account_id" id="account_id">
                        @foreach($accounts as $account)
                            <option value="{{$account->id}}">{{$account->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-12">
                    <label for="">المبلغ</label>
                    <input type="text" value="{{old('amount')}}" class="form-control @error('amount') is-invalid @enderror" name="amount">
                    @error('amount')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group col-md-12">
                    <label for="">ملاحظه</label>
                    <input type="text" value="{{old('note')}}" class="form-control @error('note') is-invalid @enderror" name="note">
                    @error('note')
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
