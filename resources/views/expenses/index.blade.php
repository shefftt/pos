@extends('layouts.master')
@section('content')
@section('title' ,'قائمة المنصرفات')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>اقسام المنصرفات</h6>
            </div>
            <div class="col text-left">
                <a class="btn btn-dark" href="{{url('expense/create')}}" role="button">اضافة  منصرف</a>

            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>المخزن</th>
                <th>قسم المنصرفات</th>
                <th>المبلغ</th>
                <th>ملحوظه</th>
                <th>الحساب</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @foreach($expenses as $expense)
                <tr>
                    <td scope="row">{{$i++}}</td>
                    <td>{{$expense->expense_category->name}}</td>
                    <td>{{$expense->stock->name}}</td>
                    <td>{{$expense->amount}}</td>
                    <td>{{$expense->note}}</td>
                    <td>{{$expense->account->name}}</td>

                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
