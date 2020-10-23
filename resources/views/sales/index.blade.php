@extends('layouts.master')
@section('content')
@section('title' ,'المبيعات')

<div class="card">
<div class="card-header">
        <div class="row">
            <div class="col">
                <h6>فواتير المبيعات</h6>
            </div>
            <div class="col text-left">
                <a class="btn btn-dark" target="_blank" href="{{url('/pos')}}" role="button"> انشاء فاتوره</a>

            </div>
        </div>
    </div>
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
                @foreach($sales as $sale)
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
</div>

@endsection