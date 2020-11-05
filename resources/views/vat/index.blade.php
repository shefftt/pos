@extends('layouts.master')
@section('content')
@section('title' ,'الضريبة')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>الضريبة</h6>
            </div>

        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>الضريبة </th>
                <th>الضبط </th>
            </tr>
            </thead>
            <tbody>
            <?php $i =1; ?>
            @foreach($vats as $vat)
                <tr>
                    <td scope="row">{{$i++}}</td>

                    <td>{{$vat->vat}}</td>
                    <td>
                    <!--<a name="" id="" class="btn  btn-sm btn-danger" href="#" role="button">ايقاف</a>-->
                    <!--<a name="" id="" class="btn  btn-sm btn-warning" href="#" role="button">تعديل</a>-->
                        <a class="btn btn-sm btn-primary" href="{{url('/vat/')}}/edit/{{$vat->id}}" role="button">تعديل</a>

                   </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
