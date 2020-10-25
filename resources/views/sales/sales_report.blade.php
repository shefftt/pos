@extends('layouts.master')
@section('content')
@section('title' ,' تقرير المشتريات ')

<form action="{{url('sales_report')}}" method="post">
    @csrf
    <div class="card-body">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="">من  </label>
                <input type="date" class="form-control"   name="from">

            </div>
            <div class="form-group col-md-4">
                <label for="">الي  </label>
                <input type="date" class="form-control"   name="to">

            </div>
            <div class="form-group col-md-4">
                <br>
                <button class="btn btn-md btn-success btn-block" type="submit">بحث</button>
            </div>


        </div>
    </div>

</form>


<div class="card-body">
    <table  id="DataTable" class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>العميل</th>
            <th> المجموع</th>
            <th> التاريخ</th>
            <th>الضبط</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1; ?>
        @foreach($sales_report as $sale)
            <tr>
                <td scope="row">{{$i++}}</td>

                <td>
                    @if(isset($sale->customer->name)){{$sale->customer->name}} @else
                        غير معروف
                    @endif
                </td>
                <td>{{$sale->total}}</td>
                <td>{{$sale->created_at}}</td>

                <td>
                    <a class="btn btn-sm btn-primary" href="{{url('/sales/')}}/{{$sale->id}}" role="button">عرض</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection

