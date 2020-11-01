@extends('layouts.master')
@section('content')
@section('title' ,' تقرير منتج ')
@foreach($product as $p)

{{$p->product->name}}

                            @foreach($product as $pro)




                                <br>
                                @if ($pro->qyt>=1)
                                    {{$pro->expir_date}}

                                   @if({{$pro->expir_date}}=={{$pro->expir_date}}){

                                     <?php
                                     $qyt=0;
                                     $qyt+= $pro->qyt;?>}

                                   else

                                       {{$pro->expir_date}}
                                <br>
                                {{$pro->qyt}}
<br>

                                @endif
                                @endif
                            @endforeach
@endforeach



@endsection


