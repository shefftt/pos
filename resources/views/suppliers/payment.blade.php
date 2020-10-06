@extends('layouts.master')
@section('content')
@section('title' ,' الدفعيات  ')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>    اضافة دفعية جديده</h6>
            </div>

        </div>
    </div>
    <form action="{{url('supplier/create')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="row">

                <div class="form-group col-md-6">
                    <label for="">المبلغ  </label>
                    <input type="text" value="{{old('amount')}}" class="form-control @error('amount') is-invalid @enderror" name="amount">
                    @error('amount')
                    <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="sub_id"> من حساب </label>
                    <select class="form-control" name="from" id="type">
                        @foreach($accounts as $account)
                        <option value="{{$account->id}}">{{$account->name}} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="sub_id"> الي حساب  </label>
                    <select class="form-control" name="to" id="type">
                        @foreach($accounts as $account)
                            <option value="{{$account->id}}">{{$account->name}} </option>
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
