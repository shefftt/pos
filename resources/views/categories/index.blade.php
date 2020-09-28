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
        <table class="table">
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
                        <a name="" id="" class="btn  btn-sm btn-primary" href="#" role="button">عرض</a>
                        <a name="" id="" class="btn  btn-sm btn-warning" href="#" role="button">تعديل</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <center>
        <div class="card-footer">
            <div class="col-md-4">
                {{ $categories->links() }}
            </div>
        </div>
    </center>
</div>

@endsection
