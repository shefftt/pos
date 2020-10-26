@extends('layouts.master')
@section('content')
@section('title' ,'التصنيفات')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>{{$categories->name}}</h6>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table  id="DataTable" class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>الصوره</th>
                <th>اسم المنتج</th>
                <th>سعر الشراء</th>
                <th>سعر البيع</th>
                <th>الضبط</th>

            </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @foreach($categories->products as $category )
                <tr>
                    <td scope="row">{{$i++}}</td>
                    <td>
                        <img  class="rounded w-25" src="{{url('/image/')}}/{{$category->image}}">
                    </td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->purchase_price}}</td>
                    <td>{{$category->sale_price}}</td>
                    <td>
                        <div class="form-group">
                            <div class="row">
                                @if(!$category->status==0)
                                    <form action="{{url('/product/CheckStatus')}}/{{$category->id}}" method="post">
                                        @csrf
                                        <button class="btn  btn-sm btn-danger" type="submit">ايقاف</button>
                                    </form>
                                @else
                                    <span class="label label-sm label-success">
                                تم الايقاف
                            </span>
                                @endif
                                <br>
                                <a name="" id="" class="btn  btn-sm btn-warning" href="{{url('/product/edit/')}}/{{$category->id}}" role="button">تعديل</a>
                                <a name="" id="" class="btn  btn-sm btn-primary" href="{{url('/product')}}/{{$category->id}}" role="button">عرض</a>
                            </div>

                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
