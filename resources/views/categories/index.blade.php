@extends('layouts.master')
@section('content')
@section('title' ,'التصنيفات')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>التصنيفات</h6>
            </div>
            <div class="col text-left">
                <a class="btn btn-secondary" href="{{url('/category/create')}}" role="button">اضافة تصنيف</a>

            </div>
        </div>
    </div>
    <div class="card-body">
        <table  id="DataTable" class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>اسم التصنيف</th>
                    <th>نوع التصنيف</th>
                    <th>الضبط</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach($categories as $category )
                <tr>
                    <td scope="row">{{$i++}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        @if(isset($category->sub->name))
                        {{$category->sub->name}}
                        @else
                        تصنيف رئيسيى
                        @endif
                    </td>
                    <td>
                        <a name="" id="" class="btn  btn-sm btn-primary" href="{{url('/category/')}}/{{$category->id}}" role="button">عرض</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
