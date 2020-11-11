


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
                <div class="form-group col-md-6">
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
                <th>اسم الموظف</th>
                <th> المبيعات</th>
                <th>المنتج</th>
                <th>نسبة الصنف</th>
                <th>نسبة الموظف</th>
            </tr>
            </thead>

            <tbody>
            <?php $i = 1;  $sum_ratio = 0; ?>
            @foreach($employee_ratio as $employee)
<?php  $sum_ratio += ($employee->sales_invoice_d->ratio)*($employee->products->sum('sub_total')/100) ?>
                            <tr>
                                <td scope="row">{{$i++}}</td>
                                <td>{{$employee->user->name}}</td>
                                <td>{{$employee->products->sum('sub_total')}}</td>
                                <td>{{$employee->sales_invoice_d->product->name}}</td>
                                <td>{{$employee->sales_invoice_d->ratio}}</td>
                                <td>{{($employee->sales_invoice_d->ratio)*($employee->products->sum('sub_total')/100)}}</td>
                            </tr>
                        @endforeach



            </tbody>
        </table>

    </div>
    <div class="card-footer">
        <h3>
            <span> الاجمالي:{{$sum_ratio}}</span>
        </h3>
    </div>
</div>

@endsection


