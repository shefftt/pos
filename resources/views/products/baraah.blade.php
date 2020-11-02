@extends('layouts.master')
@section('content')
@section('title' ,' تقرير منتج ')




                            @foreach($product as $pro)



                                {{$product->product_id}}
                                <br>







                                       {{$product->expir_date}}
                                <br>
                                {{$product->sum(qyt)}}
<br>



                            @endforeach




@endsection


