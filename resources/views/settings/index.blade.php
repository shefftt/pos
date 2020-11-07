@extends('layouts.master')
@section('content')
@section('title' , __('messages.data') )

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <h6>{{ __('messages.data') }}</h6>
            </div>
            <div class="col text-left">

            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th> {{ __('messages.Logo') }}</th>
                    <th>{{ __('messages.Shop Name') }}</th>
                    <th>{{ __('messages.Title') }}</th>
                    <th> {{ __('messages.phone') }}</th>
                    <th>{{ __('messages.product Settings') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>

                    <td>
                        <img src="{{url('/image/logo.png')}}" height="50px" class="rounded float-right" alt="logo">
                    </td>
                    <td>{{$setting->name}}</td>
                    <td>{{$setting->address}}</td>
                    <td>{{$setting->phone}}</td>

                    <td>
                        <a class="btn btn-sm btn-primary" href="{{url('/settings/')}}/edit/{{$setting->id}}" role="button">{{ __('messages.Edit') }}</a>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
