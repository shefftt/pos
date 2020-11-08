


@extends('layouts.master')
@section('content')
@section('title' ,' تقرير الارباح ')


<div class="callout callout-info">
    <form action="{{url('employee_report')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">من </label>
                    <input type="date" class="form-control" required name="from">

                </div>
                <div class="form-group col-md-6">

                    <label for="">الي </label>
                    <input type="date" class="form-control" required name="to">

                </div>
                <<div class="form-group col-md-4">
                    <label for="">الموظف</label>
                    <select name="created_by" class="form-control" id="select-state">
                        <option value="">اختر الموظف</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <br>
                    <button class="btn btn-md btn-success btn-block" type="submit" style="margin-top: 0.5rem;">بحث</button>
                </div>
            </div>
        </div>

    </form>
</div>


<div class="col-1">
    <a class="btn btn-success" onclick="printDiv('invoice')"  role="button">طباعه</a>
</div>
<br>
<div id="DivIdToPrint" class="invoice p-3 mb-3">
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th># متسلسل</th>
                <th>المنتج</th>
                <th> الوحده</th>
                <th> الكمية</th>
                <th>سعر البيع</th>
                <th>سعر الشراء</th>
                <th>مجموع  البيع</th>
                <th>مجموع  الشراء</th>
                <th>الربح</th>
            </tr>
            </thead>

            <tbody>
            <?php $i = 1;  $sum_profit = 0; ?>
            @foreach($sales_profits->products as $profit)

                <tr>
                    <td scope="row">{{$i++}}</td>
                    <td>{{$profit->product->name}}</td>




                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
    <div class="card-footer">
        <h3>

        </h3>
    </div>
</div>

@endsection
