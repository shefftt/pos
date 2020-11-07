@extends('layouts.master')
@section('content')
@section('title' ,__('messages.Stores') )

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>{{ __('messages.Stores') }}</h6>
            </div>
            <div class="col text-left">
                <a class="btn btn-secondary" href="{{url('/stock/create')}}" role="button">  {{ __('messages.Addstore') }}</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table  id="DataTable" class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>{{ __('messages.name') }}</th>
                <th> {{ __('messages.Case') }}</th>

                <th>{{ __('messages.product Settings') }}</th>
            </tr>
            </thead>
            <tbody>
            <?php $i =1; ?>
            @foreach($stocks as $stock)
                <tr>
                    <td scope="row">{{$i++}}</td>

                    <td>{{$stock->name}}</td>
                    <td>
                        @if($stock->status == 1)

                        <label class="btn  btn-sm btn-success">{{ __('messages.active') }}</label>
                        @else
                        <label class="btn  btn-sm btn-danger">{{ __('messages.not active') }}</label>
                        @endif
                    </td>

                    <td>
                        <a name="" id="" class="btn  btn-sm btn-primary" href="{{url('/stock/')}}/{{$stock->id}}" role="button">{{ __('messages.Show') }}</a>
                        <a name="" id="" class="btn  btn-sm btn-danger" href="#" role="button">{{ __('messages.turning off') }}</a>
                        <a name="" id="" class="btn  btn-sm btn-warning" href="#" role="button">{{ __('messages.Edit') }}</a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <center>
        <div class="card-footer">
            <div class="col-md-4">

            </div>
        </div>
    </center>
</div>

@endsection
