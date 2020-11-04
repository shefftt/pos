@extends('layouts.master')
@section('content')
@section('title' ,'الوحدات')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>{{ __('messages.Units') }}</h6>
            </div>
            <div class="col text-left">
                <a class="btn btn-secondary" href="{{url('/unit/create')}}" role="button"> {{ __('messages.Add Units') }} </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th> {{ __('messages.product Unit') }}</th>
            </tr>
            </thead>
            <tbody>
            <?php $i =1; ?>
            @foreach($units as $unit)
                <tr>
                    <td scope="row">{{$i++}}</td>

                    <td>{{$unit->name}}</td>
                    <!--<td>-->
                        <!--<a name="" id="" class="btn  btn-sm btn-danger" href="#" role="button">ايقاف</a>-->
                        <!--<a name="" id="" class="btn  btn-sm btn-warning" href="#" role="button">تعديل</a>-->

                    <!--</td>-->
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
