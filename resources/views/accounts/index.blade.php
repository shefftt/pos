@extends('layouts.master')
@section('content')
@section('title' ,'الحسابات')
<div class="row">
    <div class="col-lg-4 col-12">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>150</h3>

                <p>الكاش</p>
            </div>
            <div class="icon">
                <i class="fa fa-plus-circle"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-12">
        <!-- small card -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>شبكه</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-4 col-12">
        <!-- small card -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>44</h3>

                <p>اجل</p>
            </div>
            <div class="icon">
                <i class="fa fa-university"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
</div>

<div class="card">
    <div class="card-body">
        <form action="" method="post">

            <div class="row">
                <div class="form-group col-md-3">
                    <label for="starting_date">تاريخ البدايه</label>
                    <input type="date" class="form-control" name="starting_date" id="starting_date" aria-describedby="helpId">
                    <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                </div>
                <div class="form-group col-md-3">
                    <label for="end_date">تاريخ النهايه</label>
                    <input type="date" class="form-control" name="end_date" id="end_date" aria-describedby="helpId">
                    <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                </div>
                <div class="form-group col-md-3">
                    <label for="payment">طريقه الدفع</label>
                    <select class="form-control" name="payment_id" id="payment">
                        <option value="0">الكل</option>
                        @foreach($payments as $payment)
                        <option value="{{ $payment->id}}">{{ $payment->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="payment">الفواتير</label>
                    <select class="form-control" name="payment_id" id="payment">
                        <option value="purchases">مشتريات</option>
                        <option value="sales">مبيعات</option>
                    </select>
                </div>

            </div>

        </form>
    </div>
</div>

@endsection
