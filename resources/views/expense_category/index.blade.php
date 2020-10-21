@extends('layouts.master')
@section('content')
@section('title' ,'قسم المنصرفات')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>اقسام المنصرفات</h6>
            </div>
            <div class="col text-left">
                <a class="btn btn-dark" href="{{url('expense_category/create')}}" role="button">اضافة قسم منصرفات</a>

            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>الاسم </th>
                <th> الحاله</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @foreach($expense_categories as $expense_category)
                <tr>
                    <td scope="row">{{$i++}}</td>
                    <td>{{$expense_category->name}}</td>
                    <td>


                        @if (($expense_category->status)==1)

                            <a name="" id="" class="btn  btn-sm btn-danger" href="{{url('expense_category/cancel')}}/{{$expense_category->id}}" role="button">ايقاف</a>

                        @else
                            <a name="" id="" class="btn  btn-sm btn-success" href="{{url('expense_category/activate')}}/{{$expense_category->id}}" role="button">تنشيط</a>

                        @endif




                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
