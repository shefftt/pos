@extends('layouts.master')
@section('content')
@section('title' ,'المنتجات')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>المنتجات</h6>
            </div>
            <div class="col text-left">
                <a class="btn btn-secondary" href="{{url('/product/create')}}" role="button">اضافة منتج</a>

            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>الصوره</th>
                    <th>اسم المنتج</th>
                    <th>سعر الشراء</th>
                    <th>سعر البيع</th>
                    <th>التصنيف</th>
                    <th>الضبط</th>
                </tr>
            </thead>
            <tbody>
                <?php $i =1; ?>
                @foreach($products as $product)
                <tr>
                    <td scope="row">{{$i++}}</td>
                    <td>
                        <img  class="rounded w-25" src="{{url('/image/')}}/{{$product->image}}">
                    </td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->purchase_price}}</td>
                    <td>{{$product->sale_price}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>
                        <a name="" id="" class="btn  btn-sm btn-primary" href="#" role="button">عرض</a>
                        <a name="" id="" class="btn  btn-sm btn-danger" href="#" role="button">ايقاف</a>
                        <a name="" id="" class="btn  btn-sm btn-warning" href="#" role="button">تعديل</a>
                        <a name="" id="" class="btn  btn-sm btn-primary" href="#" role="button">اضافة كميه</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <center>
        <div class="card-footer">
            <div class="col-md-4">
                {{ $products->links() }}
            </div>
        </div>
    </center>
</div>

@endsection
